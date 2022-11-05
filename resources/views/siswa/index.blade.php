@extends('layouts.master')


@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                {{-- @if (session('success'))
                    <div class="alert alert-success" role="alert">

                        {{ session('success') }}
                    </div>
                @endif --}}

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">

                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                                <div class="right">
                                    <a href="/siswa/exportpdf" class="btn btn-primary btn-sm">Export PDF</a>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                        Tambah Data Siswa <i class="lnr lnr-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA DEPAN</th>
                                            <th>NAMA BELAKANG</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>ALAMAT</th>
                                            <th>Rata Rata Nilai</th>
                                            <th class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_siswa as $siswa)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <th><a
                                                        href="/siswa/profile/{{ $siswa->id }}">{{ $siswa->nama_depan }}</a>
                                                </th>
                                                <th><a
                                                        href="/siswa/profile/{{ $siswa->id }}">{{ $siswa->nama_belakang }}</a>
                                                </th>
                                                <th class="text-center">{{ $siswa->jenis_kelamin }}</th>
                                                <th>{{ $siswa->agama }}</th>
                                                <th>{{ $siswa->alamat }}</th>
                                                <th class="text-center">{{ $siswa->rataRataNilai() }}</th>
                                                <th>
                                                    <a href="/siswa/edit/{{ $siswa->id }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete"
                                                        siswa-id="{{ $siswa->id }}">Delete</a>
                                                </th>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('nama_depan') ? 'has-error' : '' }}">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control " id="nama_depan" name="nama_depan"
                            placeholder="Nama Depan" value="{{ old('nama_depan') }}">

                        @if ($errors->has('nama_depan'))
                            <span class="help-block">{{ $errors->first('nama_depan') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nama_belakang">Nama Belakang</label>
                        <input type="text" class="form-control " id="nama_belakang"name="nama_belakang"
                            placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email</label>
                        <input type="email" class="form-control " id="email"name="email"
                            placeholder="Masukkan Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                        <label for="jenis_kelamin">
                            Pilih Jenis Kelamin
                        </label>
                        <select class="form-control " id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L"{{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki - Laki
                            </option>
                            <option value="P"{{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>

                        @if ($errors->has('jenis_kelamin'))
                            <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control " id="agama"name="agama"
                            placeholder="Masukkan Agama" value="{{ old('agama') }}">

                        @if ($errors->has('agama'))
                            <span class="help-block">{{ $errors->first('agama') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control " id="avatar"name="avatar"
                            placeholder="Masukkan Avatar">
                        @if ($errors->has('avatar'))
                            <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('footer')
    <script>
        $('.delete').click(function() {
            var siswa_id = $(this).attr('siswa-id');
            swal({
                    title: "Yakin?",
                    text: "Mau Hapus Data Dengan Id " + siswa_id + " ?? ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/siswa/delete/" + siswa_id + "";
                    }
                });

        });
    </script>
@endsection
