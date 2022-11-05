<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }

        return asset('images/' . $this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {

        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
            $hitung++;
        }

        // return $total / $hitung; -- Error Division Zero

        return $total == 0 ? 0 : ($total / $hitung);
        // return $total != 0 ? ($total / $hitung) : $total; -- Ini Juga Solve
    }

    public function namaLengkap()
    {
        return $this->nama_depan . ' ' . $this->nama_belakang;;
    }
}
