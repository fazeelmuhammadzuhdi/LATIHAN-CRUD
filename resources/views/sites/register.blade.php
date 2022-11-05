@extends('layouts.frontend')


@section('content')
    <section class="hero-section set-bg" data-setbg="{{ asset('/frontend') }}/img/bg.jpg">
        <div class="container">
            <div class="hero-text text-white">
                <section class="signup-section spad" style="background: unset">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="signup-warp">
                                    <div class="section-title ">
                                        <h2>PENDAFTARAN ONLINE</h2>
                                        <p>Selamat Datang</p>
                                    </div>
                                    <!-- signup form -->
                                    {!! Form::open(['url' => '/postregister']) !!}
                                    {!! Form::text('nama_depan', '', ['class' => 'form-control mb-3', 'placeholder' => 'Nama Depan']) !!}
                                    {!! Form::text('nama_belakang', '', ['class' => 'form-control mb-3', 'placeholder' => 'Nama Belakang']) !!}
                                    {!! Form::text('agama', '', ['class' => 'form-control mb-3', 'placeholder' => 'Agama']) !!}
                                    {!! Form::text('alamat', '', ['class' => 'form-control mb-3', 'placeholder' => 'Alamat']) !!}
                                    <div class="text-left form-control ">

                                        {!! Form::select(
                                            'jenis_kelamin',
                                            ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-Laki', 'P' => 'Perempuan'],
                                            ['class' => 'form-select'],
                                        ) !!}
                                    </div>
                                    {!! Form::email('email', '', ['class' => 'form-control mt-3', 'placeholder' => 'Email']) !!}
                                    {!! Form::password('password', ['class' => 'form-control mt-3', 'placeholder' => 'Password']) !!}

                                    {{-- <button class="btn btn-primary mt-4 btn-block">Submit</button> --}}
                                    <input type="submit" class="btn btn-primary mt-4 btn-block" value="Submit">
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </section>
@endsection
