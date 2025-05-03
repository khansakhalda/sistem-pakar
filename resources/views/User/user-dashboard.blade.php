@extends('Dashboard.layout.app')

@section('content')
<style>
    .landing-wrapper {
        padding: 40px 20px 20px;
        margin-bottom: 0px;
    }

    .landing-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        text-align: center;
        width: 100%;
        max-width: 5000px;
    }

    .landing-title {
        font-size: 1.9rem;
        color: #007bff;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .landing-subtitle {
        font-weight: 700;
        color: #000;
        margin-bottom: 30px;
    }

    .divider {
        width: 80px;
        height: 3px;
        background-color: #007bff;
        margin: 0 auto 25px;
        border-radius: 6px;
    }

    .landing-paragraph {
        font-size: 1rem;
        color: #000;
        line-height: 1.7;
        margin-bottom: 0px;
    }

    .landing-paragraph strong {
        color: #007bff;
        font-weight: 500;
    }

    .disease-list span {
        font-weight: 600;
        color: #007bff;
        margin-right: 5px;
    }

    .note {
        color: #000;
        margin-top: 25px;
        font-size: 1rem;
    }
</style>

<div class="xs-pd-20-10 pd-ltr-20 landing-wrapper">
    <div class="banner-container mb-4">
        <img class="d-block w-100 rounded shadow-sm" src="{{ asset('assets/vendors/images/banner.png') }}" alt="Banner">
    </div>

    <div class="landing-card">
        <h2 class="landing-title">Selamat Datang di SIDINYAM</h2>
        <div class="divider"></div>

        <p class="landing-subtitle">
            Sistem Informasi Diagnosa Penyakit Akibat Gigitan Nyamuk
        </p>

        <p class="landing-paragraph">
            Aplikasi pintar yang dirancang untuk membantu Anda <strong>mengidentifikasi</strong> dan <strong>memahami</strong> penyakit akibat gigitan nyamuk.
        </p>

        <p class="landing-paragraph">
            Penyakit yang dikenali meliputi:
            <span>DBD</span>,
            <span>Malaria</span>,
            <span>Chikungunya</span>,
            <span>Encephalitis</span>,
            <span>Zika</span>,
            <span>Filariasis</span>, dan
            <span>Demam Kuning</span>.
        </p>

        <p class="note">
            Mari bersama-sama menjaga kesehatan dan meningkatkan kesadaran terhadap <strong>penyakit tropis</strong> ini.
        </p>
    </div>
</div>
@endsection
