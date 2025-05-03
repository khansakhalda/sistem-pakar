@extends('Dashboard.layout.app')

@section('content')
<style>
    .introjs-tooltip {
        max-width: 300px;
        padding: 16px 18px;
        border-radius: 10px;
        border: 2px solid #007bff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
        font-size: 13px;
        overflow-wrap: break-word;
    }

    .introjs-tooltip-title {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 8px;
    }

    .introjs-tooltiptext {
        color: #444;
        font-size: 13px;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .introjs-button {
        background-color: #007bff !important;
        color: #fff !important;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 13px;
    }

    .introjs-button:hover {
        background-color: #0056b3 !important;
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
        background-color: #d0e4ff !important;
    }

    .introjs-bullets ul li a.active {
        background-color: #007bff !important;
    }

    .introjs-button {
    background-color: #007bff !important;
    color: #fff !important;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    box-shadow: none !important;
    text-shadow: none !important;
    transform: none !important;
    font-family: 'Segoe UI', sans-serif;
}

.introjs-button:hover {
    background-color: #0056b3 !important;
}

.introjs-tooltipbuttons button:focus {
    outline: none;
    box-shadow: none !important;
}

    .introjs-tooltip .introjs-tooltip-title + .introjs-tooltiptext:empty {
        display: none;
    }

    .btn-custom-blue {
        background: linear-gradient(135deg, #007bff, #339cff);
        color: #fff;
        border: none;
    }

    .btn-custom-blue:hover {
        background: linear-gradient(135deg, #0056b3, #2a90ff);
    }
</style>

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4 style="color: #007bff;">Halaman Konsultasi</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #007bff;">Konsultasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{ route('diagnosis.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="pd-20 card-box mb-0 mb-md-2" style="margin-top: -1.2em;">
        <div class="mb-4">
            <h4 class="fw-bold" style="color: #007bff;">Form Diagnosa Awal</h4>
            <p class="text-muted" style="margin-top: 0.5rem;">
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
                        <td @if ($i == 1) id="step1" @endif>{{ $g->nama_gejala }}</td>
                        <td>
                            <select name="cf[]" class="form-control" @if ($i == 1) id="step2" @endif>
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

        <!-- Floating Submit Button -->
        <div style="position: fixed; bottom: 2em; right: 3em; z-index: 9999;" id="step3">
            <button type="submit" class="p-3 shadow btn btn-lg rounded-circle btn-custom-blue" title="Mulai Diagnosis">
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
