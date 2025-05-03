@extends('Dashboard.layout.app')

@section('content')
<style>
    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        border-left: 5px solid #007bff;
        padding-left: 15px;
        margin-bottom: 1rem;
        color: #333;
    }

    .highlight {
        background: #e3f2fd;
        padding: 3px 6px;
        border-radius: 4px;
        color: #0056b3;
        font-weight: 600;
    }

    .disclaimer {
        font-size: 14px;
        color: #dc3545;
        background-color: #fef2f2;
        border-left: 4px solid #f5c6cb;
        padding: 14px;
        border-radius: 6px;
        margin-top: 30px;
    }

    .breadcrumb a,
    .breadcrumb .breadcrumb-item.active {
        color: #007bff;
        font-weight: 500;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .text-info-custom {
        color: #007bff;
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
    }

    .card-custom {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 1.5rem;
    }

    .info-box {
        background: #f8f9fa;
        border-left: 4px solid #007bff;
        padding: 1rem 1.2rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .info-box:hover {
        background: #e9f5ff;
        transform: scale(1.01);
    }

    .info-box strong {
        display: block;
        color: #004085;
        margin-bottom: 5px;
    }
</style>

<div class="page-header mb-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-info-custom">Tentang Aplikasi</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light rounded px-3 py-2 shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Aplikasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card card-custom mb-5">
    <h5 class="section-title">Apa itu SIDINYAM?</h5>
    <p>
        <strong>SIDINYAM</strong> atau <span class="highlight">Sistem Informasi Diagnosa Penyakit Akibat Gigitan Nyamuk</span> adalah aplikasi berbasis web yang membantu masyarakat mengenali gejala penyakit akibat gigitan nyamuk secara cepat dan informatif.
    </p>

    <h5 class="section-title">Penyakit yang Dideteksi</h5>
    <div class="info-grid">
        <div class="info-box">
            <strong>Demam Berdarah Dengue (DBD)</strong>
            Demam tinggi, nyeri otot, dan ruam karena virus dengue.
        </div>
        <div class="info-box">
            <strong>Malaria</strong>
            Demam dan menggigil akibat parasit Plasmodium lewat nyamuk Anopheles.
        </div>
        <div class="info-box">
            <strong>Chikungunya</strong>
            Demam dan nyeri sendi hebat karena virus chikungunya.
        </div>
        <div class="info-box">
            <strong>Encephalitis</strong>
            Radang otak serius karena virus yang dibawa nyamuk.
        </div>
        <div class="info-box">
            <strong>Zika</strong>
            Gejala ringan, tapi berisiko tinggi pada kehamilan.
        </div>
        <div class="info-box">
            <strong>Filariasis</strong>
            Infeksi cacing filaria yang bisa sebabkan pembengkakan ekstrem.
        </div>
        <div class="info-box">
            <strong>Demam Kuning</strong>
            Infeksi virus dengan gejala sakit kuning dan potensi gagal organ.
        </div>
    </div>

    <h5 class="section-title mt-4">Fitur Utama SIDINYAM</h5>
    <div class="info-grid">
        <div class="info-box">
            <strong>Deteksi Gejala</strong>
            Analisa awal penyakit berdasarkan gejala pengguna.
        </div>
        <div class="info-box">
            <strong>Manajemen Pengguna</strong>
            Pengelolaan akun dan data pengguna oleh admin.
        </div>
        <div class="info-box">
            <strong>Informasi Penyakit</strong>
            Penjelasan detail gejala, penyebab, dan pencegahan.
        </div>
        <div class="info-box">
            <strong>Basis Pengetahuan</strong>
            Data pakar sebagai landasan diagnosa sistem.
        </div>
        <div class="info-box">
            <strong>Certainty Factor</strong>
            Persentase keyakinan terhadap hasil diagnosa.
        </div>
    </div>

    <p class="disclaimer mt-4">
        ⚠️<strong>Disclaimer:</strong> SIDINYAM memberikan hasil diagnosis berdasarkan gejala awal dan bukan pengganti pemeriksaan medis resmi. Konsultasikan dengan tenaga medis profesional untuk diagnosis yang lebih akurat.
    </p>
</div>
@endsection
