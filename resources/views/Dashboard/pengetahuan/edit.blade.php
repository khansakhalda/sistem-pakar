@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Ubah Basis Pengetahuan</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengetahuan.index') }}">Pengetahuan</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Ubah</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <h5 class="fw-semibold mb-4" style="color: #ff9800;">Form Ubah Data Pengetahuan</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengetahuan.update', $data->kode_pengetahuan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Kode Penyakit ({{ $data->desease->nama_penyakit }})</label>
            <input type="text" readonly class="form-control" name="kode_penyakit" value="{{ $data->desease->kode_penyakit }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Pilih Gejala</label>
            <select name="kode_gejala" class="form-control">
                @foreach ($gejala as $g)
                    @if (!$selected->contains($g->kode_gejala) || $data->kode_gejala == $g->kode_gejala)
                        <option value="{{ $g->kode_gejala }}" @if ($data->kode_gejala == $g->kode_gejala) selected @endif>
                            {{ $g->nama_gejala }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">
                MB (Measure of Belief) 
                <i class="bi bi-info-circle-fill text-success" data-bs-toggle="tooltip" title="Tingkat keyakinan terhadap suatu gejala terhadap penyakit, skala 0-1"></i>
            </label>
            <input type="number" step="any" min="0" max="1" name="mb_pakar" class="form-control" value="{{ $data->mb_pakar }}">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">
                MD (Measure of Disbelief) 
                <i class="bi bi-info-circle-fill text-success" data-bs-toggle="tooltip" title="Tingkat keraguan terhadap suatu gejala terhadap penyakit, skala 0-1"></i>
            </label>
            <input type="number" step="any" min="0" max="1" name="md_pakar" class="form-control" value="{{ $data->md_pakar }}">
        </div>

        <div class="d-flex justify-content-end" style="gap: 10px;">
            <a href="{{ route('pengetahuan.index') }}" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endpush
@endsection
