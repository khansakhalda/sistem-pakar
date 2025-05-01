@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Form Ubah Penyakit</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('penyakit.index') }}">Penyakit</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <h5 class="fw-semibold mb-4" style="color: #ff9800;">Ubah Data Penyakit</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penyakit.update', $data->kode_penyakit) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_penyakit" class="form-label fw-semibold">Nama Penyakit</label>
            <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" value="{{ $data->nama_penyakit }}" placeholder="Contoh: Asma, Bronkitis">
        </div>

        <div class="mb-4">
            <label for="areaDetail" class="form-label fw-semibold">Informasi Penyakit</label>
            <textarea id="areaDetail" name="detail_penyakit" class="form-control" rows="10">{!! $data->detail_penyakit !!}</textarea>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <div class="d-flex" style="gap: 16px;">
    <a href="{{ route('penyakit.index') }}" class="btn btn-danger me-3">Batal</a>
    <button type="submit" class="btn btn-success">Simpan</button>
</div>

        </div>
    </form>
</div>

@push('text-editor')
<script src="https://cdn.tiny.cloud/1/k3mdbnpx3lfq7yyc5ojih4xl5n3iz0qe0i3il7vdtildb7ae/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#areaDetail',
        plugins: 'code lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code',
        height: 300
    });
</script>
@endpush
@endsection
