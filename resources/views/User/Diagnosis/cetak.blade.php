<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/vendors/images/uniska.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->nama_pengguna }}_{{ substr($data->created_at, 0, 10) }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 13px;
            margin: 30px;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            color: #ff914d;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td, th {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .no-border td {
            border: none;
            padding: 4px 0;
        }

        .tb-header {
            background-color: #ffcc8a;
            color: #333;
        }

        .tb-keyakinan td {
            font-weight: bold;
        }

        .info-box {
            margin-top: 20px;
            border: 1px solid #ffcc8a;
            background: #fff6e5;
            padding: 15px;
            border-radius: 6px;
        }

        .disclaimer {
            margin-top: 20px;
            font-size: 13px;
            color: #c00;
            background-color: #fef2f2;
            border: 1px solid #f5c2c2;
            padding: 12px;
            border-radius: 5px;
        }

        .tabletitle th {
    background-color: #ffcc8a;
            color: #333;
}

    </style>
</head>
<body>
    <h1>Hasil Diagnosa : {{ $data->nama_pengguna }}</h1>

    <table class="no-border" style="width: auto; margin-bottom: 20px;">
    <tr>
        <td style="width: 140px; vertical-align: top;"><strong>Tanggal Konsultasi</strong></td>
        <td style="width: 10px; vertical-align: top;">:</td>
        <td>{{ substr($data->created_at, 0, 10) }}</td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><strong>Umur</strong></td>
        <td style="vertical-align: top;">:</td>
        <td>{{ $data->age }} tahun</td>
    </tr>
    <tr>
        <td style="vertical-align: top;"><strong>Alamat</strong></td>
        <td style="vertical-align: top;">:</td>
        <td>{{ $data->user->address }}</td>
    </tr>
</table>


    <h3 style="margin-top: 30px; margin-bottom: 5px;">Detail Gejala</h3>
    <table>
        <thead class="tb-header">
            <tr>
                <th>No</th>
                <th>Kode Gejala</th>
                <th>Gejala</th>
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

    <div class="info-box">
        <p>Berdasarkan gejala dan kondisi yang dipilih, kemungkinan Anda mengalami:</p>
        <table class="tb-keyakinan">
            <tr>
                <td>Nama Penyakit</td>
                <td>: {{ $data->desease->nama_penyakit }}</td>
            </tr>
            <tr>
                <td>Nilai Keyakinan</td>
                <td>: {{ number_format($data->nilai_akhir, 2) . '%' }}</td>
            </tr>
        </table>
    </div>

    <div class="info-box">
        <h3>Informasi Penyakit: {{ $data->desease->nama_penyakit }}</h3>
        <div>{!! $data->desease->detail_penyakit !!}</div>
    </div>

    @if(collect(json_decode($data->hasil))->where('kode_penyakit', '!=', $data->desease->kode_penyakit)->where('nilai', '>', 0)->count() > 0)
        <h3 style="margin-top: 30px;">Kemungkinan Penyakit Lain</h3>
        <table>
            <thead class="tabletitle">
                <tr>
                    <th>No</th>
                    <th>Nama Penyakit</th>
                    <th>Nilai Keyakinan</th>
                </tr>
            </thead>
            <tbody>
                @php $j = 1; @endphp
                @foreach (json_decode($data->hasil) as $penyakit)
                    @if ($penyakit->kode_penyakit !== $data->desease->kode_penyakit && $penyakit->nilai > 0)
                        <tr>
                            <td>{{ $j++ }}</td>
                            <td>{{ $penyakit->nama_penyakit }}</td>
                            <td>{{ number_format($penyakit->nilai, 2) . '%' }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="disclaimer">
        <strong>Disclaimer:</strong> Hasil diagnosis ini bersifat sementara dan bukan pengganti pemeriksaan dokter. Silakan konsultasikan lebih lanjut kepada tenaga medis untuk diagnosis yang akurat.
    </div>
</body>
</html>
