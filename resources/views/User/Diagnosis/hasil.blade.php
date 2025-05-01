@extends('Dashboard.layout.app')

@section('content')
<style>
    h4.title-orange {
        color: #ff914d;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .info-label {
        font-weight: bold;
        color: #333;
    }

    .info-value {
        color: #555;
    }

    .tb-gejala,
    .tb-gejala2 {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .tb-gejala th,
    .tb-gejala td,
    .tb-gejala2 td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .tb-gejala th {
        background-color: #ffecd2;
        color: #444;
    }

    .tb-gejala2 td:first-child {
        width: 200px;
        background-color: #fff5eb;
        font-weight: bold;
        color: #444;
    }

    .tb-gejala2 td:last-child {
        background-color: #fff;
        text-align: left;
    }

    .highlight-box {
        background-color: #fff9f0;
        border: 1px solid #ffcc8f;
        padding: 1rem;
        border-radius: 5px;
        margin-top: 1.5rem;
    }

    .text-orange {
        color: #ff914d;
    }

    .tabletitle h2 {
        font-size: 1rem;
        margin: 0;
    }

    .disclaimer {
        font-size: 0.9rem;
        background-color: #fff4f4;
        border: 1px solid #ffdddd;
        padding: 10px;
        color: #b30000;
        margin-top: 2rem;
        border-radius: 6px;
    }
</style>

<div class="xs-pd-10-1 pd-ltr-10">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h4 class="text-orange">Hasil Diagnosis</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #ff914d;">Hasil Diagnosis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="title-orange">Diagnosis untuk: {{ $data->nama_pengguna }} ({{ $data->user->address }})</h4>
            <a href="{{ route('cetak-diagnosis', $data->diagnosis_id) }}" class="btn btn-success">
                <i class="bi bi-printer"></i> Cetak
            </a>
        </div>

        <table class="mb-3">
            <tr>
                <td class="info-label">Tanggal Konsultasi</td>
                <td class="info-value">: {{ substr($data->created_at, 0, 10) }}</td>
            </tr>
            <tr>
                <td class="info-label">Umur</td>
                <td class="info-value">: {{ $data->age }} tahun</td>
            </tr>
        </table>

        <h5 class="text-orange">Gejala yang Dipilih:</h5>
        <table class="tb-gejala">
            <thead>
                <tr class="tabletitle">
                    <th>No</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach (json_decode($data->gejala) as $diagnosa)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $diagnosa->kode_gejala }}</td>
                        <td>{{ $diagnosa->nama_gejala }}</td>
                        <td>{{ $diagnosa->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="highlight-box">
            <p class="mb-2">Berdasarkan gejala dan kondisi yang Anda pilih, kemungkinan besar Anda mengalami:</p>
            <table class="tb-gejala2">
                <tr>
                    <td>Nama Penyakit</td>
                    <td>: {{ $data->desease->nama_penyakit }}</td>
                </tr>
                <tr>
                    <td>Nilai Keyakinan</td>
                    <td>: {{ number_format($data->nilai_akhir, 2) }}%</td>
                </tr>
            </table>
        </div>

        <h5 class="text-orange mt-4">Informasi Penyakit</h5>
        <table class="tb-gejala">
            <tr>
                <td>{!! $data->desease->detail_penyakit !!}</td>
            </tr>
        </table>

        @if(json_decode($data->hasil))
            <h5 class="text-orange mt-4">Kemungkinan Penyakit Lain</h5>
            <table class="tb-gejala">
                <thead>
                    <tr class="tabletitle">
                        <th>No</th>
                        <th>Nama Penyakit</th>
                        <th>Nilai Keyakinan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach (json_decode($data->hasil) as $penyakit)
                        @if ($penyakit->kode_penyakit !== $data->desease->kode_penyakit && $penyakit->nilai > 0)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $penyakit->nama_penyakit }}</td>
                                <td>{{ number_format($penyakit->nilai, 2) }}%</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif

        <p class="disclaimer mt-4">
            <strong>Disclaimer:</strong> Hasil diagnosis ini bersifat sementara dan bukan pengganti pemeriksaan dokter. Silakan konsultasikan lebih lanjut kepada tenaga medis untuk diagnosis yang akurat.
        </p>
    </div>
</div>
@endsection
