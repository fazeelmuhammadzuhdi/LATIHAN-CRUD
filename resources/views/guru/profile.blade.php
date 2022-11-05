@extends('layouts.master')


@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">

                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">

                        {{ session('error') }}
                    </div>
                @endif
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="" width="125" height="125" class="img-circle" alt="Avatar">
                                    <h3 class="name">{{ $guru->nama }}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->


                    <div class="profile-right">

                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mata Pelajaran Yang Di Ajar Oleh Guru {{ $guru->nama }}</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mata Pelajaran</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Semester</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru->mapel as $mapel)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $mapel->kode }}</td>
                                                <td>{{ $mapel->nama }}</td>
                                                <td>{{ $mapel->semester }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
@endsection
