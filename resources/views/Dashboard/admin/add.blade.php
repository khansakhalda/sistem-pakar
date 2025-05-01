@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Admin</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="index.html">Admin</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Admin
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2rem;">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Tambah Admin</h4>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action={{ route('data-admin.store') }} method="POST">
            @csrf
            @method('POST')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="name" placeholder="masukkan nama">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="email" placeholder="masukkan email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="address" placeholder="masukkan alamat">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="password" placeholder="masukkan password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="password_confirmation"
                        placeholder="masukkan password yang sama">
                </div>
            </div>

            <div class="flex-row-reverse d-flex" style="gap:8px;">
                <button class="btn btn-large btn-info " type="submit">Tambah</button>
                <a href={{ route('data-admin.index') }} class="btn btn-large btn-dark ">Batal</a>
            </div>


        </form>

    </div>

    <!-- basic table  End -->
@endsection
