@extends('Dashboard.layout.app')

@section('content')
<style>
    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #ff914d;
    }
    .highlight {
        color: #ff914d;
        font-weight: 600;
    }
    .disclaimer {
        font-size: 14px;
        color: #dc3545;
        background-color: #fef2f2;
        border: 1px solid #f5c6cb;
        padding: 12px;
        border-radius: 5px;
        margin-top: 25px;
    }
    .breadcrumb a,
    .breadcrumb .breadcrumb-item.active {
        color: #ff914d;
        font-weight: 500;
        text-decoration: none;
    }
    .breadcrumb a:hover {
        text-decoration: underline;
    }
    .text-info-custom {
        color: #ff914d;
    }
</style>

<div class="page-header mb-3">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-info-custom fw-bold mb-1">Tentang Aplikasi</h4>
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb bg-white rounded px-3 py-2 shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Aplikasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-lg p-4 mb-5">
    <h5 class="section-title mb-3">Apa itu SIDINYAM?</h5>
    <p>
        <strong>SIDINYAM</strong> atau <span class="highlight">Sistem Informasi Diagnosa Penyakit Akibat Gigitan Nyamuk</span> adalah aplikasi cerdas yang dirancang untuk membantu masyarakat dalam mengenali gejala berbagai penyakit yang disebabkan oleh gigitan nyamuk.
    </p>

    <h5 class="section-title mt-4 mb-2">Penyakit yang Dideteksi</h5>
    <ul style="padding-left: 20px;">
        <li><strong>Demam Berdarah Dengue (DBD)</strong>: Penyakit akibat virus dengue yang ditularkan oleh nyamuk Aedes aegypti. Gejala umumnya termasuk demam tinggi, nyeri otot, dan ruam.</li>
        <li><strong>Malaria</strong>: Disebabkan oleh parasit Plasmodium dan ditularkan melalui nyamuk Anopheles. Gejalanya meliputi demam, menggigil, dan sakit kepala.</li>
        <li><strong>Chikungunya</strong>: Virus yang menyebabkan demam dan nyeri sendi hebat. Biasanya dibawa oleh nyamuk Aedes.</li>
        <li><strong>Encephalitis</strong>: Radang otak yang bisa disebabkan oleh virus yang dibawa oleh nyamuk. Dapat menimbulkan gangguan saraf serius.</li>
        <li><strong>Zika</strong>: Infeksi virus Zika dapat menyebabkan gejala ringan tetapi berisiko tinggi pada ibu hamil karena berpotensi menyebabkan mikrosefali pada janin.</li>
        <li><strong>Filariasis</strong>: Penyakit kronis akibat infeksi cacing filaria yang ditularkan melalui gigitan nyamuk, dapat menyebabkan pembengkakan ekstrem (elephantiasis).</li>
        <li><strong>Demam Kuning</strong>: Infeksi virus akut yang menyebar lewat nyamuk dan ditandai dengan demam, sakit kuning, dan potensi kegagalan organ.</li>
    </ul>

    <h5 class="section-title mt-4 mb-2">Fitur Utama SIDINYAM</h5>
    <ul style="padding-left: 20px;">
        <li><strong>Deteksi Gejala</strong>: Mengidentifikasi potensi penyakit berdasarkan gejala yang diinput pengguna.</li>
        <li><strong>Manajemen Pengguna</strong>: Registrasi, login, dan pengelolaan data pengguna oleh admin.</li>
        <li><strong>Informasi Penyakit</strong>: Penjelasan detail tentang penyakit nyamuk, gejala, dan langkah pencegahan.</li>
        <li><strong>Basis Pengetahuan</strong>: Data pakar yang digunakan dalam proses perhitungan diagnosa.</li>
        <li><strong>Certainty Factor</strong>: Menampilkan tingkat keyakinan diagnosa secara kuantitatif.</li>
    </ul>

    <p class="disclaimer">
        <strong>Disclaimer:</strong> SIDINYAM memberikan hasil diagnosis berdasarkan gejala awal dan bukan pengganti pemeriksaan medis resmi. Konsultasikan dengan dokter untuk penanganan lebih lanjut.
    </p>
</div>
@endsection
