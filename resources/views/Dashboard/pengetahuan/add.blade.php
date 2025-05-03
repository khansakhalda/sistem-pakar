@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #0d6efd;">Tambah Basis Pengetahuan</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengetahuan.index') }}">Pengetahuan</a></li>
                    <li class="breadcrumb-item active" style="color: #0d6efd;" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <h5 class="fw-semibold mb-4" style="color: #0d6efd;">Form Tambah Pengetahuan</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengetahuan.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label fw-semibold">Nama Penyakit:</label>
            <div class="col-sm-9">
                <select name="kode_penyakit" id="select1" class="form-control">
                    <option value="">Pilih Penyakit</option>
                    @foreach ($penyakit as $p)
                        <option value="{{ $p->kode_penyakit }}">{{ $p->nama_penyakit }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label fw-semibold">Pilih Gejala:</label>
            <div class="col-sm-9">
                <select name="kode_gejala" id="select2" class="form-control">
                    <option value="">Pilih Gejala</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label fw-semibold">
                MB (Measure of Belief)
                <i class="fa fa-info-circle text-success" data-toggle="popover" data-placement="bottom"
                   title="MB (Measure of Belief)"
                   data-content="Nilai kepercayaan pakar terhadap gejala yang mendukung penyakit. Rentang 0–1."></i>
            </label>
            <div class="col-sm-9">
                <input type="number" name="mb_pakar" step="any" value="1" min="0" max="1" class="form-control">
            </div>
        </div>

        <div class="mb-4 row">
            <label class="col-sm-3 col-form-label fw-semibold">
                MD (Measure of Disbelief)
                <i class="fa fa-info-circle text-success" data-toggle="popover" data-placement="bottom"
                   title="MD (Measure of Disbelief)"
                   data-content="Tingkat ketidakpercayaan pakar terhadap gejala yang tidak mendukung penyakit. Rentang 0–1."></i>
            </label>
            <div class="col-sm-9">
                <input type="number" name="md_pakar" step="any" value="0" min="0" max="1" class="form-control">
            </div>
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="d-flex justify-content-end mt-4">
            <div class="d-flex" style="gap: 16px;">
                <a href="{{ route('pengetahuan.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    select.form-control {
        padding-right: 1.8rem !important; /* kurangi padding agar icon lebih ke kiri */
        background-position: right 0.8rem center !important; /* geser ikon lebih ke kiri */
    }
</style>
@endpush


@push('scripts')
<script>
    $(function () {
        $('[data-toggle="popover"]').popover();

        $('#select1').change(function () {
            var selectedValue = $(this).val();
            $.ajax({
                url: '/get-data',
                method: 'GET',
                data: { selectedValue: selectedValue },
                success: function (response) {
                    $('#select2').empty().append('<option value="">Pilih Gejala</option>');
                    $.each(response, function (key, value) {
                        $('#select2').append('<option value="' + value.kode_gejala + '">' + value.nama_gejala + '</option>');
                    });
                }
            });
        });
    });
</script>
@endpush
