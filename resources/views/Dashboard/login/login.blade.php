<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login SIPDIK - Sistem Informasi Penyakit dan Deteksi ISPA Klinis | Cek Gejala ISPA Secara Dini</title>

    <!-- Meta Description -->
    <meta name="description"
        content="SIPDIK adalah aplikasi berbasis web yang membantu masyarakat mendeteksi gejala Infeksi Saluran Pernapasan Akut (ISPA) secara dini dan mudah. Akses informasi kesehatan ISPA dan cek kondisi kesehatan Anda dengan mudah melalui sistem ini.">

    <!-- Meta Keywords -->
    <meta name="keywords"
        content="SIPDIK, deteksi ISPA, gejala ISPA, kesehatan, infeksi saluran pernapasan, ISPA klinis, cek ISPA, deteksi dini ISPA, kesehatan masyarakat, aplikasi ISPA, cek gejala ISPA, penyakit pernapasan, cek kesehatan online">

    <!-- Meta Author -->
    <meta name="author" content="SIPDIK Team">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="SIPDIK - Sistem Informasi Penyakit dan Deteksi ISPA Klinis" />
    <meta property="og:description"
        content="SIPDIK membantu masyarakat mendeteksi gejala ISPA dengan cepat dan mudah melalui platform berbasis web. Dapatkan informasi kesehatan dan cek gejala Anda sekarang!" />
    <meta property="og:url" content="https://www.sipdik.online" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://cek-ispa.online/assets/vendors/images/logo.png" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SIPDIK - Sistem Informasi Penyakit dan Deteksi ISPA Klinis">
    <meta name="twitter:description"
        content="Aplikasi deteksi dini gejala ISPA berbasis web yang memudahkan masyarakat mendapatkan informasi kesehatan yang akurat.">
    <meta name="twitter:image" content="https://cek-ispa.online/assets/vendors/images/logo.png">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('assets/vendors/images/uniska.png') }} />
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('assets/vendors/images/uniska.png') }} />
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/vendors/images/uniska.png') }} />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description"
        content="sistem pakar infeksi saluran pernapasan akut ispa dengan metode certainly factor" />
    <meta name="keywords" content="sistem pakar login, expert system" />
    <link rel="stylesheet" href={{ asset('assets/login/style.css') }} />

    <style type="text/css">
        .fil0 {
            fill: #c27b55;
        }

        .fil1 {
            fill: #f2cbb6;
        }

        .fil2 {
            fill: #fff0e8;
        }

        .author_info {
            text-align: center;
        }

        .author_info ul {
            list-style: none;
            margin-top: 10px;
        }

        .author_info ul li {
            margin-right: 10px;
            display: inline;
        }

        .author_info ul li a img {
            width: 40px;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-title">
            <h1>Login SIPDIK</h1>
        </div>
        @include('Dashboard.login.avatar')

        <div class="inputGroup inputGroup1">
            <label for="loginEmail" id="loginEmailLabel">Email</label>
            <input type="email" id="loginEmail" required name="email" />

            @if ($errors->get('email'))
                <div class="alert">
                    @foreach ($errors->get('email') as $error)
                        <li>{{ $error }}
                    @endforeach
                </div>
            @endif
        </div>

        <div class="inputGroup inputGroup2">
            <label for="loginPassword" id="loginPasswordLabel">Password</label>
            <input type="password" id="loginPassword" name="password" required />
            <label id="showPasswordToggle" for="showPasswordCheck">Show
                <input id="showPasswordCheck" type="checkbox" />
                <div class="indicator"></div>
            </label>
            @if ($errors->get('password'))
                <div class="alert">
                    @foreach ($errors->get('password') as $error)
                        <li>{{ $error }}
                    @endforeach
                </div>
            @endif
        </div>
        <div class="inputGroup inputGroup3">
            <input id="remember" type="checkbox" name="remember" />
            <label for="remember">Remember Me</label>
        </div>
        <!-- Lupa Kata Sandi -->
<div class="inputGroup inputGroup3" style="text-align: center; margin-bottom: 10px;">
    <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: underline;">
        Lupa Kata Sandi?
    </a>
</div>

<!-- Tombol Login -->
<div class="inputGroup inputGroup3">
    <button type="submit" id="login">Log in</button>
</div>

<!-- Tombol Kembali -->
<div class="inputGroup inputGroup3">
    <a href="{{ route('home') }}">
        <button id="back" type="button">Kembali</button>
    </a>
</div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin.min.js?r=182"></script>
    <script src="{{ asset('assets/login/script.js') }}"></script>

</body>

</html>
