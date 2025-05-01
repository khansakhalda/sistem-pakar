@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Registrasi</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Registrasi
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2rem">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Registrasi Akun</h4>
                <p class="text-secondary " style="margin-top: -0.5rem"><small>Isi form dibawah untuk membuat akun
                        anda</small></p>

            </div>
            <div class="pull-right">
                <a href="{{ route('login') }}" class="btn btn-info"> Saya sudah punya akun!
                </a>

            </div>
        </div>


        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{ old('name') }}" type="text" placeholder="Masukkan Nama"
                        name="name">
                    @if ($errors->get('name'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('name') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Umur</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{ old('age') }}" type="text" placeholder="Masukkan Umur"
                        name="age">
                    @if ($errors->get('age'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('age') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nomer HP</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{ old('number') }}" type="text"
                        placeholder="Masukkan Nomer HP, contoh:085xxxxxxxxxxxxx" name="number">
                    @if ($errors->get('number'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('number') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{ old('email') }}" type="email" placeholder="Masukkan Email"
                        name="email">
                    @if ($errors->get('email'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('email') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">alamat</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="{{ old('address') }}" type="" placeholder="Masukkan alamat"
                        name="address">
                    @if ($errors->get('address'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('address') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" name="password" placeholder="Masukkan password">
                    @if ($errors->get('password'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('password') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="password" name="password_confirmation"
                        placeholder="Masukkan Password lagi">
                    @if ($errors->get('password_confirmation'))
                        <div class="mt-1 alert alert-danger">
                            @foreach ($errors->get('password_confirmation') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex-row-reverse d-flex" style="gap:8px;">
                <button class="btn btn-large btn-info " type="submit">Simpan</button>
                {{-- <a href={{ route('data-admin.index') }} class="btn btn-large btn-dark ">Kembali</a> --}}
            </div>


        </form>

    </div>


@endsection
