@extends('Dashboard.layout.app')

@section('content')
<style>
    .introjs-tooltip {
        max-width: 300px;
        padding: 16px 18px;
        border-radius: 10px;
        border: 2px solid #ff914d;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
        overflow-wrap: break-word;
    }

    .introjs-tooltip-title {
        font-size: 16px;
        font-weight: bold;
        color: #ff914d;
        margin-bottom: 8px;
    }

    .introjs-tooltiptext {
        color: #444;
        font-size: 13px;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .introjs-button {
        background-color: #ff914d !important;
        color: #fff !important;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 13px;
    }

    .introjs-button:hover {
        background-color: #ff7b2d !important;
    }

    .introjs-skipbutton {
        background: none !important;
        color: #aaa !important;
        font-weight: 500;
        font-size: 13px;
    }

    .introjs-tooltipbuttons {
        display: flex;
        justify-content: space-between;
        margin-top: 8px;
        gap: 10px;
    }

    .introjs-bullets ul li a {
        background-color: #ffd8bc !important;
    }

    .introjs-bullets ul li a.active {
        background-color: #ff914d !important;
    }

    /* Cegah tombol ganda */
    .introjs-tooltipbuttons button + button {
        display: none !important;
    }

    .introjs-tooltip .introjs-tooltip-title + .introjs-tooltiptext:empty {
        display: none;
    }
</style>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4 style="color: #ff9800;">Halaman Konsultasi</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #ff9800;">Konsultasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{ route('diagnosis.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="pd-20 card-box" style="margin-top: -1.2em; margin-bottom: 5rem;">
        <div class="mb-4">
            <h4 class="fw-bold" style="color: #ff9800;">Form Diagnosa Awal</h4>
            <p class="text-muted" style="margin-top: -0.5rem;">
                <small>Silakan pilih kondisi gejala yang sedang Anda alami secara jujur untuk hasil diagnosa yang akurat.</small>
            </p>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success"><p>{{ $message }}</p></div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        @if (session('error_gejala'))
            <div class="alert alert-danger">
                {{ session('error_gejala') }}
            </div>
        @endif

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="nama_pengguna" value="{{ Auth::user()->name }}" readonly>
                <input type="hidden" name="kode_pengguna" value="{{ Auth::user()->id }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Usia</label>
            <div class="col-md-10">
                <input class="form-control" type="number" name="age" value="{{ Auth::user()->age }}" readonly>
            </div>
        </div>

        <div class="mb-4 row">
            <label class="col-md-2 col-form-label">Alamat</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="alamat_pengguna" value="{{ Auth::user()->address }}" readonly>
            </div>
        </div>

        <table class="table table-bordered" id="myTable2">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Gejala</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($gejala as $g)
                    <tr>
                        <td>{{ $i }}</td>
                        <td @if ($i == 1) id="step1" class="highlight" @endif>{{ $g->nama_gejala }}</td>
                        <td>
                            <select name="cf[]" class="form-control cf3" @if ($i == 1) id="step2" class="highlight" @endif>
                                <option value="">Pilih sesuai kondisi Anda</option>
                                @foreach ($term as $k)
                                    <option value="{{ $g->kode_gejala }}*{{ $g->nama_gejala }}*{{ $k['nilai'] }}*{{ $k['deskripsi'] }}">
                                        {{ $k['deskripsi'] }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @php $i++ @endphp
                @endforeach
            </tbody>
        </table>

        <div style="position: fixed; bottom: 2em; right: 3em; z-index: 9999;" id="step3" class="highlight">
            <button type="submit" class="p-3 shadow btn btn-lg btn-info rounded-circle" title="Mulai Diagnosis">
                <img width="50" height="50" src="{{ asset('assets/vendors/images/diagnosis.gif') }}" alt="diagnosis">
            </button>
        </div>
    </div>
</form>

@role('user')
    @push('scripts')
    <script>
        function startIntro() {
            const intro = introJs();
            intro.setOptions({
                steps: [
                    {
                        title: "Selamat Datang",
                        intro: "Halo 👋! Ikuti langkah berikut untuk memulai proses diagnosa."
                    },
                    {
                        title: "Langkah 1",
                        element: "#step1",
                        intro: "Pilih gejala yang Anda rasakan saat ini.",
                        position: "bottom"
                    },
                    {
                        title: "Langkah 2",
                        element: "#step2",
                        intro: "Tentukan tingkat keyakinan terhadap gejala tersebut.",
                        position: "bottom"
                    },
                    {
                        title: "Langkah 3",
                        element: "#step3",
                        intro: "Klik tombol ini untuk memulai diagnosa penyakit.",
                        position: "left"
                    }
                ],
                showButtons: true,
                showBullets: true,
                showStepNumbers: false,
                nextLabel: "Lanjut",
                prevLabel: "Kembali",
                skipLabel: "Lewati",
                doneLabel: "Selesai",
                scrollPadding: "100"
            });

            // Hilangkan duplikat tombol jika ada
            intro.onafterchange(function () {
                document.querySelectorAll('.introjs-tooltipbuttons button + button').forEach(b => b.remove());
            });

            intro.start();
        }

        startIntro();
    </script>
    @endpush
@endrole

@endsection
