<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <!-- Title -->
    <title>SIDINYAM - Sistem Informasi Diagnosa Penyakit Akibat Gigitan Nyamuk</title>

    <!-- Meta Description -->
    <meta name="description"
        content="SIDINYAM adalah aplikasi berbasis web yang membantu masyarakat mendeteksi gejala Infeksi Saluran Pernapasan Akut (ISPA) secara dini dan mudah. Akses informasi kesehatan ISPA dan cek kondisi kesehatan Anda dengan mudah melalui sistem ini.">

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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href={{ asset('assets/vendors/styles/core.css') }} />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
    <link rel="stylesheet" type="text/css" href={{ asset('assets/vendors/styles/icon-font.min.css') }} />
    {{-- <link rel="stylesheet" type="text/css"
        href={{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }} />
    <link rel="stylesheet" type="text/css"
        href={{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }} /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <!-- INTRO JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js@7.2.0/minified/introjs.min.css" />
    <link rel="stylesheet" type="text/css" href={{ asset('assets/vendors/styles/style.css') }} />
    <link rel="stylesheet" type="text/css" href={{ asset('assets/css/custom.css') }} />
    <!-- LOTIE FILES -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    {{-- <link rel="stylesheet" type="text/css"
        href={{ asset('assets/src/plugins/ion-rangeslider/css/ion.rangeSlider.css') }} /> --}}
    @stack('text-editor')

</head>

<body>
    @stack('chatbot')
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src={{ asset('assets/vendors/images/deskapp-logo.svg') }} alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}




    <!-- header start -->
    @include('Dashboard.layout.header')
    <!-- header end -->

    <!-- sidebar start -->
    @include('Dashboard.layout.sidebar')
    <!-- sidebar end -->

    <div class="mobile-menu-overlay"></div>

    <!-- Main Content start -->
    <div class="main-container">
        @yield('content')
        <div class="mb-2 text-center footer-wrap pd-20 card-box">
            Copyright &copy; 2025
            <a href="https://ft.unsoed.ac.id/" style="color: black; text-decoration: none; font-weight: bold;"
                target="_blank">
                Fakultas Teknik - Prodi Informatika Universitas Jenderal Soedirman
            </a>
        </div>

    </div>
    <!-- Main Content end -->



    <!-- js -->
    <script src={{ asset('assets/vendors/scripts/core.js') }}></script>
    <script src={{ asset('assets/vendors/scripts/script.min.js') }}></script>
    <script src={{ asset('assets/vendors/scripts/process.js') }}></script>
    <script src={{ asset('assets/vendors/scripts/layout-settings.js') }}></script>
    {{-- <script src={{ asset('assets/src/plugins/apexcharts/apexcharts.min.js') }}></script> --}}
    {{-- <script src={{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}></script>
    <script src={{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}></script> --}}
    {{-- <script src={{ asset('assets/vendors/scripts/dashboard3.js') }}></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    {{-- <script src={{ asset('assets/src/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}></script>
    <script src={{ asset('assets/vendors/scripts/range-slider-setting.js') }}></script> --}}

    <!-- INTRO JS-->
    <script src="https://cdn.jsdelivr.net/npm/intro.js@7.2.0/intro.min.js"></script>
    @stack('scripts')
    <script>
        new DataTable('#myTable', {
            lengthMenu: [10, 25, 50, 75, 100],
            responsive: true
        });

        new DataTable('#myTable2', {
            lengthMenu: [10, 25, 50, 75, 100],
            pageLength: 100,
            responsive: true,
            searching: false

        });
        new DataTable('#myTable3', {
            lengthMenu: [10, 25, 50, 75, 100],
            pageLength: 100,
            responsive: true,
            columnDefs: [{
                    targets: 2, // Kolom pertama
                    responsivePriority: 1 // Prioritas lebih tinggi
                },
                {
                    targets: 3, // Kolom kedua
                    responsivePriority: 2 // Prioritas lebih tinggi dari default
                },
                {
                    targets: 5, // Kolom ketiga
                    responsivePriority: 3 // Default prioritas
                },
                {
                    targets: 4, // Kolom keempat
                    responsivePriority: 10002 // Prioritas lebih rendah (akan tersembunyi lebih awal)
                }

            ]

        });
        new DataTable('#myTable4', {

            responsive: true,
            columnDefs: [{
                    targets: 1, // Kolom pertama
                    responsivePriority: 1 // Prioritas lebih tinggi
                },
                {
                    targets: 3, // Kolom kedua
                    responsivePriority: 2 // Prioritas lebih tinggi dari default
                },
                {
                    targets: 5, // Kolom ketiga
                    responsivePriority: 3 // Default prioritas
                },
                {
                    targets: 4, // Kolom keempat
                    responsivePriority: 10002 // Prioritas lebih rendah (akan tersembunyi lebih awal)
                }

            ]

        });

        $(document).ready(function() {
            $('#cf').change(function() {
                var selectedColor = $('option:selected', this).css('color');
                $(this).css('color', selectedColor);
            }).change();

            $('#cf2').change(function() {
                var selectedColor = $('option:selected', this).css('color');
                $(this).css('color', selectedColor);
            }).change();

            $('.cf3').change(function() {
                var selectedColor = $('option:selected', this).css('color');
                $(this).css('color', selectedColor);
            }).change();

            $(".checkbox-dropdown").click(function() {
                $(this).toggleClass("is-active");
            });

            $(".checkbox-dropdown ul").click(function(e) {
                e.stopPropagation();
            });
            $('#areaDetail').on('input', function() {
                $('#inputDetail').val($(this).val());
            });
            $('#areaSolusi').on('input', function() {
                $('#inputSolusi').val($(this).val());
            });
        });
    </script>

</body>

</html>
