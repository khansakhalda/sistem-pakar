@extends('Dashboard.layout.app') 

@push('styles')
<style>
    input.form-control:focus {
        border-color: #007bff !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #007bff;">Ubah Informasi Pengguna</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('data-admin.index') }}">Daftar Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #007bff;">Ubah Data</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card shadow-sm rounded-lg mt-3 mb-5">
    <div class="card-body">
        <h5 class="fw-semibold mb-4" style="color: #007bff;">Formulir Pengguna</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('data-admin.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" value="{{ $data->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Usia</label>
                <input class="form-control" type="number" name="age" value="{{ $data->age }}">
            </div>

            <div class="mb-3">
                <label class="form-label">No. Handphone</label>
                <input class="form-control" type="text" name="number" value="{{ $data->number }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <input class="form-control" type="email" name="email" value="{{ $data->email }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Alamat Domisili</label>
                <input class="form-control" type="text" name="address" value="{{ $data->address }}">
            </div>

            <div class="d-flex justify-content-end" style="gap: 1rem;">
                <a href="{{ route('data-admin.index') }}" class="btn btn-outline-danger px-4">Batal</a>
                <button class="btn btn-success text-white px-4" type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
