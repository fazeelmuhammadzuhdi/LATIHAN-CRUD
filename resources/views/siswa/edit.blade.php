@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Inputs</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/siswa/update/{{ $siswa->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_depan">Nama Depan</label>
                                        <input type="text" class="form-control " id="nama_depan" name="nama_depan"
                                            placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_belakang">Nama Belakang</label>
                                        <input type="text" class="form-control " id="nama_belakang"name="nama_belakang"
                                            placeholder="Nama Belakang" value="{{ $siswa->nama_depan }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_kelamin">
                                            Pilih Jenis Kelamin
                                        </label>
                                        <select class="form-control " id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki -
                                                Laki
                                            </option>
                                            <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>
                                                Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" class="form-control " id="agama"name="agama"
                                            placeholder="Masukkan Agama" value="{{ $siswa->agama }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $siswa->alamat }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" class="form-control " id="avatar"name="avatar"
                                            placeholder="Masukkan Avatar">
                                    </div>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
