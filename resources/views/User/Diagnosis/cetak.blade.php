<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $data->nama_pengguna }}_{{ substr($data->created_at, 0, 10) }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/vendors/images/uniska.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
        margin: 20px;
        color: #000;
    }

    h1 {
        text-align: center;
        font-size: 18px;
        color: #000;
        margin-bottom: 10px;
    }

    h3 {
        margin: 16px 0 8px 0;
        color: #000;
        font-size: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 6px;
        font-size: 13px;
    }

    td, th {
        padding: 6px 8px;
        border: 1px solid #cce0ff;
        text-align: left;
        background-color: #eaf3ff;
        color: #000;
    }

    .no-border td {
        border: none;
        background-color: transparent;
        padding: 2px 0;
    }

    .tb-header th,
    .tabletitle th {
        background-color: #d6eaff;
        color: #000;
        font-weight: bold;
    }

    .tb-keyakinan td {
        font-weight: bold;
        background-color: #eaf3ff;
    }

    .info-box {
        margin-top: 14px;
        border-left: 4px solid #007bff;
        background: #f1f7ff;
        padding: 12px;
        border-radius: 6px;
    }

    .disclaimer {
        margin-top: 16px;
        font-size: 13px;
        color: #b30000;
        background-color: #fef2f2;
        border-left: 4px solid #dc3545;
        padding: 10px;
        border-radius: 5px;
    }
</style>

</head>
<body>
    <h1>Hasil Diagnosis: {{ $data->nama_pengguna }}</h1>

    <table class="no-border" style="width: auto; margin-bottom: 20px;">
        <tr>
            <td style="width: 140px;"><strong>Tanggal Konsultasi</strong></td>
            <td style="width: 10px;">:</td>
            <td>{{ substr($data->created_at, 0, 10) }}</td>
        </tr>
        <tr>
            <td><strong>Umur</strong></td>
            <td>:</td>
            <td>{{ $data->age }} tahun</td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td>:</td>
            <td>{{ $data->user->address }}</td>
        </tr>
    </table>

    <h3>Gejala yang Dipilih</h3>
    <table>
        <thead class="tb-header">
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

    <div class="info-box">
        <p style="margin-bottom: 8px;">Berdasarkan gejala dan kondisi yang Anda pilih, kemungkinan besar Anda mengalami:</p>
        <table class="tb-keyakinan">
            <tr>
                <td style="width: 160px;">Nama Penyakit</td>
                <td>: {{ $data->desease->nama_penyakit }}</td>
            </tr>
            <tr>
                <td>Nilai Keyakinan</td>
                <td>: {{ number_format($data->nilai_akhir, 2) }}%</td>
            </tr>
        </table>
    </div>

    <div class="info-box">
        <h3>Informasi Penyakit</h3>
        <div style="color: #000;">{!! $data->desease->detail_penyakit !!}</div>
    </div>

    @if(collect(json_decode($data->hasil))->where('kode_penyakit', '!=', $data->desease->kode_penyakit)->where('nilai', '>', 0)->count() > 0)
        <h3>Kemungkinan Penyakit Lain</h3>
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
                            <td>{{ number_format($penyakit->nilai, 2) }}%</td>
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
