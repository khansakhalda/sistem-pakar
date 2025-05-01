<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <style>
        * {
            margin: 0;
            box-sizing: border-box;

        }

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

        #invoice {

            background: #FFF;
        }

        .header {
            margin-bottom: 1.2em;
            text-align: center;

        }

        [id='invoice'] {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            padding: 30px;
        }


        .tb-gejala {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            border: 1px solid #ffdb4a
        }

        td {
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
            margin-top: 1em
        }

        .tb-gejala2 td {
            font-weight: bold;
            font-size: 1.1em;
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
            margin-top: 1em
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div id="invoice">
        <div class="header">
            <h1>HASIL DIAGNOSA : {{ $data->nama_pengguna }} ({{ $data->alamat_pengguna }})</h1>
        </div>

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

        <p>Berdasarkan gejala dan kondisi yang dipilih, kemungkinan besar anda mengalami :
        </p>
        <table class="tb-gejala2">
            <tr>
                <td>Nama Penyakit </td>
                <td>:</td>
                <td>{{ $data->desease->nama_penyakit }}</td>
            </tr>
            <tr>
                <td>Nilai Keyakinan </td>
                <td>:</td>
                <td>{{ number_format($data->nilai_akhir, 2) . '%' }}</td>
            </tr>
        </table>
        <table class="tb-gejala">
            <tr class="tabletitle">
                <th>
                    <h2>Detail Penyakit {{ $data->desease->nama_penyakit }}</h2>
                </th>
            </tr>
            <tr class="service">
                <td style="padding: 1em" class="tableitem">{!! $data->desease->detail_penyakit !!}</td>
            </tr>




        </table>
        <table class="tb-gejala">
            <tr class="tabletitle">
                <th>
                    <h2>Solusi Penyakit {{ $data->desease->nama_penyakit }}</h2>
                </th>
            </tr>
            <tr class="service">
                <td style="padding: 1em" class="tableitem">{!! $data->desease->solusi_penyakit !!}</td>
            </tr>




        </table>
        <hr class="solid">
        <p>Adapun kemungkinan penyakit yang mungkin anda alami :
        </p>
        <table class="tb-gejala">
            <tr class="tabletitle">
                <th>
                    <h2>No</h2>
                </th>
                <th>
                    <h2>Kode Penyakit</h2>
                </th>
                <th>
                    <h2>Nama Penyakit</h2>
                </th>
                <th>
                    <h2>Nilai Keyakinan</h2>
                </th>
            </tr>
            <?php $i = 1; ?>
            @foreach (json_decode($data->hasil) as $penyakit)
                @if ($penyakit->kode_penyakit !== $data->desease->kode_penyakit && $penyakit->nilai > 0)
                    <tr class="service">
                        <td class="tableitem">{{ $i++ }}</td>
                        <td class="tableitem">{{ $penyakit->kode_penyakit }}</td>
                        <td class="tableitem">{{ $penyakit->nama_penyakit }}</td>
                        <td class="tableitem">{{ number_format($penyakit->nilai, 2) . '%' }}</td>

                    </tr>
                @endif
            @endforeach



        </table>
    </div>
</body>

</html>
