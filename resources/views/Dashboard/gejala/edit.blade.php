@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Form Ubah Gejala</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('gejala.index') }}">Gejala</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <h5 class="fw-semibold mb-4" style="color: #ff9800;">Ubah Data Gejala</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gejala.update', $data->kode_gejala) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kode_gejala" class="form-label fw-semibold">Kode Gejala</label>
            <input type="text" name="kode_gejala" id="kode_gejala" class="form-control" value="{{ $data->kode_gejala }}" readonly>
        </div>

        <div class="mb-4">
            <label for="nama_gejala" class="form-label fw-semibold">Nama Gejala</label>
            <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" value="{{ $data->nama_gejala }}" placeholder="Contoh: Batuk Kering, Demam">
        </div>

        <div class="d-flex justify-content-end mt-4" style="gap: 12px;">
            <a href="{{ route('gejala.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
