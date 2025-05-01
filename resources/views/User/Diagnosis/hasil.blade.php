@extends('Dashboard.layout.app')

@section('content')
    <style>
        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        table {
            margin-top: 10rem;
        }

        p {
            font-size: 1em;
            /* color: #666; */
            line-height: 1.2em;
        }

        #wrapper {

            background: #FFF;
        }

        .header {
            margin-bottom: 1.2em;
            text-align: center;

        }

        [id='wrapper'] {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            /* padding: 30px; */
        }


        .tb-gejala {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            border: 1px solid #ffdb4a
        }

        .tb-gejala th {
            border: 1px solid #6e6e6e
        }


        td,
        th {
            text-align: center;
        }

        .tb-gejala td {
            padding: 5px 0 5px 15px;
            border: 1px solid #d1cece
        }

        th {
            padding: 5px;
            /* border: 1px solid #d1cece; */
        }

        .tb-gejala2 {

            margin-top: 1em;
            border-collapse: collapse;
        }

        .tb-gejala2 td {
            text-align: left;
            font-weight: bold;
            font-size: 1.1em;
            padding: 5px;
            border: 1px solid #d1cece;
        }



        .tabletitle {
            padding: 5px;
            background: #FFBB70;
        }

        .tb-gejala:nth-last-of-type(4) .tabletitle,
        .tb-gejala:nth-last-of-type(5) .tabletitle {

            background: #FFEC9E;
        }



        .tb-gejala:nth-last-of-type(1) .tabletitle {
            background: #5BBCFF;
        }

        .service {
            border: 1px solid #EEE;
        }

        .itemtext {
            font-size: .9em;
        }

        /* Solid border */
        hr.solid {
            /* border-top: 1px solid #d6d6d6; */
            margin-top: 2rem;
            margin-bottom: 10px;
            height: 1px;
            border: none;
            background: rgb(216, 216, 216);
        }

        p {
            /* margin-top: 1em */
        }

        .disclaimer {
            font-size: 14px;
            color: #ff0000;
            /* Warna teks merah */
            background-color: #f9f9f9;
            /* Warna latar belakang abu-abu muda */
            border: 1px solid #e0e0e0;
            /* Garis batas abu-abu */
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .identitas-pasien {
            margin-top: 0;
        }

        .identitas-pasien td {
            text-align: left;
        }
    </style>
    <div class="xs-pd-10-1 pd-ltr-10">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="title">
                        <h4>Diagnosis</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{ route('dashboard') }}>Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Hasil Diagnosis
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <!-- basic table  Start -->

        <div class=" mb-30 pd-20 card-box" style="margin-top: -1.2em;">
            <div class="clearfix mb-12">
                <div class="pull-left">
                    <h4 class="text-blue h4">HASIL DIAGNOSA : {{ $data->nama_pengguna }} ({{ $data->user->address }})</h4>

                </div>
                <div class="pull-right">

                    <a href="{{ route('cetak-diagnosis', $data->diagnosis_id) }}" class="text-white btn btn-success">
                        <i class="bi bi-printer"></i> &nbsp; Cetak
                    </a>

                </div>
            </div>

            <div id="wrapper">

                <table class="identitas-pasien">
                    <tr>
                        <td>Tanggal Konsultasi</td>
                        <td>&nbsp;:&nbsp;{{ substr($data->created_at, 0, 10) }}</td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>&nbsp;:&nbsp;{{ $data->age }} tahun</td>
                    </tr>
                </table>


                {{-- <strong>Gejala yang Anda Alami :</strong> --}}
                <table class="tb-gejala">
                    <tr class="tabletitle">
                        <th class="item">
                            <h2>No</h2>
                        </th>
                        <th class="Hours">
                            <h2>Kode Gejala</h2>
                        </th>
                        <th class="Rate">
                            <h2>Gejala</h2>
                        </th>
                        <th class="subtotal">
                            <h2>Kondisi</h2>
                        </th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach (json_decode($data->gejala) as $diagnosa)
                        <tr class="service">
                            <td class="tableitem">{{ $i++ }}</td>
                            <td class="tableitem">{{ $diagnosa->kode_gejala }}</td>
                            <td class="tableitem">{{ $diagnosa->nama_gejala }}</td>
                            <td class="tableitem">
                                {{ $diagnosa->deskripsi }}
                            </td>
                        </tr>
                    @endforeach


                </table>

                <hr class="solid">

                <p>Berdasarkan gejala dan kondisi yang dipilih, kemungkinan anda mengalami :
                </p>
                <table class="tb-gejala2">

                    <tr>
                        <td>Nama Penyakit</td>
                        <td>: {{ $data->desease->nama_penyakit }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Keyakinan</td>
                        <td>: {{ number_format($data->nilai_akhir, 2) . '%' }}</td>
                    </tr>
                </table>
                <table class="tb-gejala">
                    <tr class="tabletitle">
                        <th>
                            <h2>Informasi Penyakit {{ $data->desease->nama_penyakit }}</h2>
                        </th>
                    </tr>
                    <tr class="service">
                        <td style="padding: 1em" style="text-align: left" class="tableitem">{!! $data->desease->detail_penyakit !!}</td>
                    </tr>

                </table>
                {{-- <table class="tb-gejala">
                    <tr class="tabletitle">
                        <th>
                            <h2>Solusi Penyakit {{ $data->desease->nama_penyakit }}</h2>
                        </th>
                    </tr>
                    <tr class="service">
                        <td style="padding: 1em" class="tableitem">{!! $data->desease->solusi_penyakit !!}</td>
                    </tr>
                </table> --}}
                <hr class="solid">
                <p>Adapun penyakit lain yang mungkin anda alami :
                </p>

                <table class="tb-gejala">
                    <tr class="tabletitle">
                        <th class="item">
                            <h2>No</h2>
                        </th>
                        <th class="Hours">
                            <h2>Nama Penyakit</h2>
                        </th>
                        <th class="Rate">
                            <h2>Nilai Keyakinan</h2>
                        </th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach (json_decode($data->hasil) as $penyakit)
                        @if ($penyakit->kode_penyakit !== $data->desease->kode_penyakit && $penyakit->nilai > 0)
                            <tr class="service">
                                <td class="tableitem">{{ $i++ }}</td>
                                <td class="tableitem">{{ $penyakit->nama_penyakit }}</td>
                                <td class="tableitem">{{ number_format($penyakit->nilai, 2) . '%' }}</td>

                            </tr>
                        @endif
                    @endforeach



                </table>
                <p class="disclaimer">
                    <b>Disclaimer:</b> Hasil dari Sistem ini bukan merupakan keputusan final. Diperlukan
                    pemeriksaan dan
                    uji
                    laboratorium oleh tenaga medis atau dokter untuk verifikasi lebih lanjut.
                </p>
            </div>

        </div>

    </div>
@endsection
