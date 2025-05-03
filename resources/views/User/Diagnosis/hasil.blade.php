@extends('Dashboard.layout.app')

@section('content')
<style>
    h4.title-blue {
        color: #007bff;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .info-label {
        font-weight: 500;
        color: #333;
    }

    .info-value {
        color: #333;
    }

    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        overflow: hidden;
        font-size: 0.95rem;
    }

    .modern-table th,
    .modern-table td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .modern-table th {
        background-color: #f7f9fc;
        color: #333;
        font-weight: 600;
    }

    .modern-table tr:last-child td {
        border-bottom: none;
    }

    .highlight-box {
        background-color: #f8f9fb;
        border-left: 4px solid #007bff;
        padding: 1.2rem;
        border-radius: 6px;
        margin-top: 1.5rem;
    }

    .section-title {
        margin-top: 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        color: #007bff;
    }

    .disclaimer {
        font-size: 0.9rem;
        background-color: #fff8f8;
        border-left: 4px solid #dc3545;
        padding: 12px;
        color: #b30000;
        margin-top: 2rem;
        border-radius: 6px;
    }

    .print-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: background 0.3s ease;
    }

    .print-btn:hover {
        background-color: #218838;
    }
</style>

<div class="xs-pd-10-1 pd-ltr-10 mb-5">
    <div class="page-header mb-3">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title-blue">Hasil Diagnosis</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="color: #007bff;">Hasil Diagnosis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card-box shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-semibold" style="color: #333;">Diagnosis untuk: {{ $data->nama_pengguna }} ({{ $data->user->address }})</h5>
            <a href="{{ route('cetak-diagnosis', $data->diagnosis_id) }}" class="print-btn">
                <i class="bi bi-printer"></i> Cetak
            </a>
        </div>

        <table>
            <tr>
                <td class="info-label">Tanggal Konsultasi</td>
                <td class="info-value">: {{ substr($data->created_at, 0, 10) }}</td>
            </tr>
            <tr>
                <td class="info-label">Umur</td>
                <td class="info-value">: {{ $data->age }} tahun</td>
            </tr>
        </table>

        <div class="section-title">Gejala yang Dipilih:</div>
        <table class="modern-table">
            <thead>
                <tr>
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

        <div class="highlight-box mt-4">
            <p class="mb-2 text-dark">Berdasarkan gejala dan kondisi yang Anda pilih, kemungkinan besar Anda mengalami:</p>
            <table class="table mb-0">
                <tr>
                    <td class="fw-bold" style="width: 200px;">Nama Penyakit</td>
                    <td>: {{ $data->desease->nama_penyakit }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Nilai Keyakinan</td>
                    <td>: {{ number_format($data->nilai_akhir, 2) }}%</td>
                </tr>
            </table>
        </div>

        <div class="section-title">Informasi Penyakit</div>
        <div class="bg-white border p-3 rounded shadow-sm text-dark">
            {!! $data->desease->detail_penyakit !!}
        </div>

        @if(json_decode($data->hasil))
            <div class="section-title">Kemungkinan Penyakit Lain</div>
            <table class="modern-table">
                <thead>
                    <tr>
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

        <p class="disclaimer">
            ⚠️<strong>Disclaimer:</strong> Hasil diagnosis ini bersifat sementara dan bukan pengganti pemeriksaan dokter. Silakan konsultasikan lebih lanjut kepada tenaga medis untuk diagnosis yang akurat.
        </p>
    </div>
</div>
@endsection
