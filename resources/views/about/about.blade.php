@extends('Dashboard.layout.app')

@section('content')
    <style>
        .disclaimer {
            font - size: 14 px;
            color: #ff0000;
            /* Warna teks merah */
            background - color: #f9f9f9;
            /* Warna latar belakang abu-abu muda */
            border: 1 px solid #e0e0e0;
            /* Garis batas abu-abu */
            padding: 10 px;
            border - radius: 5 px;
            margin - top: 20 px;
        }
    </style>
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>About</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tentang Aplikasi
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2rem">
        <div class="blog-caption">

            <h4 class="mb-10">
                Sistem Informasi Penyakit dan Deteksi ISPA Klinis (SIPDIK)
            </h4>

            <p>
                Kesehatan saluran pernapasan merupakan aspek penting dalam menjaga kesejahteraan tubuh secara keseluruhan.
                Berbagai penyakit dapat menyerang saluran pernapasan, baik bagian atas maupun bawah, yang sering kali
                memerlukan penanganan cepat dan tepat.
                Aplikasi Sistem Informasi Penyakit dan Deteksi ISPA Klinis (SIPDIK) dirancang untuk membantu pengguna dalam
                mengenali dan memahami berbagai penyakit yang termasuk dalam kategori ISPA, serta memberikan panduan
                mengenai langkah-langkah yang dapat diambil.
            </p>

            <p>
                <strong>Saluran Pernapasan Akut (ISPA)</strong> adalah kumpulan penyakit yang menyerang saluran pernapasan,
                baik bagian atas maupun bawah, yang disebabkan oleh berbagai virus dan bakteri. Contoh penyakit ISPA antara
                lain:
            </p>

            <ul style="list-style-type: disc; padding-left: 20px;">
                <li><strong>Croup</strong>: Penyakit ini menyebabkan pembengkakan pada saluran napas, biasanya pada
                    anak-anak, yang mengakibatkan batuk keras dan napas yang berbunyi.</li>
                <li><strong>Sinusitis Akut</strong>: Peradangan pada sinus yang menyebabkan gejala seperti nyeri wajah,
                    hidung tersumbat, dan keluarnya lendir.</li>
                <li><strong>Pertusis (Batuk Rejan)</strong>: Infeksi bakteri yang menyebabkan batuk parah yang berlangsung
                    lama dan sering kali disertai dengan bunyi "whoop".</li>
                <li><strong>Bronchitis</strong>: Peradangan pada saluran bronkial di paru-paru, yang menyebabkan batuk dan
                    produksi lendir yang berlebihan.</li>
                <li><strong>Pneumonia</strong>: Infeksi yang menyebabkan peradangan pada kantung-kantung udara di paru-paru,
                    sering kali menyebabkan demam, batuk, dan sesak napas.</li>
                <li><strong>Epiglotitis</strong>: Pembengkakan pada epiglotis yang dapat menghalangi saluran udara dan
                    memerlukan penanganan darurat.</li>
                <li><strong>Tonsilitis Akut</strong>: Peradangan pada amandel yang menyebabkan sakit tenggorokan, kesulitan
                    menelan, dan pembengkakan pada kelenjar getah bening.</li>
                <li><strong>Faringitis (Radang Tenggorokan)</strong>: Infeksi pada tenggorokan yang menyebabkan sakit,
                    iritasi, dan kadang-kadang disertai demam.</li>
                <li><strong>Laringitis Akut</strong>: Peradangan pada laring yang menyebabkan suara serak atau hilang,
                    sering kali disertai batuk.</li>
                <li><strong>Asma</strong>: Penyakit kronis yang menyebabkan penyempitan dan pembengkakan saluran udara, yang
                    mengakibatkan kesulitan bernapas, batuk, dan mengi.</li>
            </ul>

            <p>
                Untuk membantu mengidentifikasi penyakit-penyakit tersebut, aplikasi ini menggunakan
                <strong>Sistem Pendukung Keputusan (SPK)</strong>. SPK dirancang untuk membantu proses pengambilan keputusan
                dengan memanfaatkan data dan informasi yang ada. Dalam konteks SIPDIK, sistem ini memberikan rekomendasi
                diagnosis berdasarkan gejala yang diinput oleh pengguna. Dengan SPK, pengguna dapat memperoleh panduan yang
                lebih jelas dalam memahami kemungkinan penyakit yang mereka alami.
            </p>

            <p>
                Selain itu, untuk memberikan diagnosis yang lebih akurat, aplikasi ini dilengkapi dengan fitur
                <strong>Certainty Factor</strong>. Certainty Factor membantu mengukur tingkat keyakinan terhadap diagnosis
                yang diberikan, memberikan pengguna gambaran seberapa besar kemungkinan diagnosis tersebut benar. Dengan
                fitur ini, pengguna dapat membuat keputusan yang lebih informasional terkait kesehatan mereka.
            </p>

            <h5 class="mb-10">Sebagai bagian dari layanan yang diberikan, aplikasi ini menawarkan beberapa fitur penting,
                termasuk:</h5>
            <ol style="list-style-type: circle;" class="pl-4">
                <li>
                    <strong>Manajemen Pengguna</strong>: Memungkinkan admin untuk membuat dan mengelola akun pengguna dalam
                    aplikasi.
                </li>
                <li>
                    <strong>Manajemen Data Penyakit</strong>: Menyediakan informasi lengkap tentang penyakit ISPA, termasuk
                    penyebab, gejala, dan cara penanganannya.
                </li>
                <li>
                    <strong>Data Gejala</strong>: Menampilkan daftar gejala yang umum dialami oleh penderita ISPA, lengkap
                    dengan penjelasan singkat.
                </li>
                <li>
                    <strong>Pengetahuan</strong>: Berisi informasi medis yang digunakan untuk membantu proses diagnosis
                    berdasarkan gejala yang ada.
                </li>
                <li>
                    <strong>Diagnosis</strong>: Aplikasi memberikan diagnosis berdasarkan gejala yang diinput, dengan
                    tingkat keyakinan yang dihitung menggunakan Certainty Factor.
                </li>
            </ol>
            </br>
            <p class="disclaimer">
                <b>Disclaimer:</b> Hasil dari Sistem ini bukan merupakan keputusan final. Diperlukan
                pemeriksaan dan uji laboratorium oleh tenaga medis atau dokter untuk verifikasi lebih lanjut.
            </p>
        </div>
    </div>




    <!-- basic table  End -->
@endsection
