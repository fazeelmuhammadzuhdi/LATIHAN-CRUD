<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mapel;
use App\Models\Siswa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SiswaController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('cari')) {
            $data_siswa = Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {

            $data_siswa = Siswa::all();
        }
        return view('siswa.index', [
            'data_siswa' => $data_siswa
        ]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png'
        ]);

        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', [
            'siswa' => $siswa
        ]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);

        return redirect('/siswa')->with('success', 'Data Berhasil Di Hapus');;
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();

        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {

                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }

        return view('siswa.profile', [
            'siswa' => $siswa,
            'matapelajaran' => $matapelajaran,
            'categories' => $categories,
            'data' => $data
        ]);
    }

    public function addnilai(Request $request, $id)
    {

        $siswa = Siswa::find($id);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('/siswa/profile/' . $id)->with('error', 'Data Mata Pelajaran Sudah Ada');
        }
        $siswa->mapel()->attach($request->mapel, [
            'nilai' => $request->nilai
        ]);

        return redirect('/siswa/profile/' . $id)->with('success', 'Data Nilai Berhasil Di tambahkan');
    }

    public function deletenilai($id, $idmapel)
    {
        $siswa = Siswa::find($id);
        $siswa->mapel()->detach($idmapel);

        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportpdf()
    {
        $siswa = Siswa::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('export.siswapdf', [
            'siswa' => $siswa
        ]);
        return $pdf->download('siswa.pdf');

        // $pdf->loadHTML('<h1>Data Siswa</h1>');
        // return $pdf->download('siswa.pdf');
    }
}
