@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-1 fw-bold" style="color: #0d6efd;">Profil</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" style="color: #0d6efd;" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- basic table Start -->
<div class="pd-20 card-box mb-30" style="margin-top: -1.2rem">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4" style="color: #0d6efd;">Informasi Akun</h4>
            <p class="text-secondary" style="margin-top: -0.5rem">
                <small>Silakan isi formulir di bawah ini untuk memperbarui profil Anda.</small>
            </p>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{ $user->name }}" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Umur</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="number" value="{{ $user->age }}" name="age">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nomer HP</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{ $user->number }}" name="number">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="email" value="{{ $user->email }}" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="{{ $user->address }}" name="address">
            </div>
        </div>

        <div class="flex-row-reverse d-flex" style="gap:8px;">
            <button class="btn btn-success btn-lg" type="submit">Simpan</button>
        </div>
    </form>
</div>
<!-- basic table End -->

@include('Dashboard.profile.update-password')
@endsection
