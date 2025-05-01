@extends('Dashboard.layout.app')

@section('content')
    <style>
        .introjs-tooltip .introjs-skipbutton,
        .introjs-tooltip .introjs-nextbutton,
        .introjs-tooltip .introjs-prevbutton,
        .introjs-tooltip .introjs-donebutton {
            margin: 5px;
            padding: 5px 10px;
            font-size: 15px;
            line-height: 1.5;
        }
    </style>
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Konsultasi</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Konsultasi
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <form action={{ route('diagnosis.store') }} method="POST">
        @csrf
        @method('POST')
        <div class="pd-20 card-box" style="margin-top: -1.2em;margin-bottom:5rem; ">
            <div class="clearfix mb-12">
                <div class="pull-left">
                    <h4 class="text-blue h4">Mulai Konsultasi</h4>
                    <p class="text-secondary " style="margin-top: -0.5rem"><small>Pilih kondisi sesuai dengan gejala yang
                            sedang
                            anda
                            alami</small></p>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
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

            <div class="my-3 form-group row">
                <label class=" col-md-2 col-4 col-form-label">Nama :</label>
                <div class=" col-md-10 col-8">
                    <input class="form-control" @if (Auth::user()->hasRole('user')) readonly @endif
                        value="{{ Auth::user()->name }}" type="text" name="nama_pengguna" placeholder="masukkan nama">
                    <input hidden value="{{ Auth::user()->id }}" type="text" name="kode_pengguna">
                </div>
            </div>
            <div class="my-3 form-group row">
                <label class=" col-md-2 col-4 col-form-label">Umur :</label>
                <div class=" col-md-10 col-8">
                    <input class="form-control" @if (Auth::user()->hasRole('user')) readonly @endif
                        value="{{ Auth::user()->age }}" type="number" name="age" placeholder="masukkan umur">
                </div>
            </div>

            <div class="my-3 form-group row">
                <label class=" col-md-2 col-4 col-form-label">Alamat :</label>
                <div class=" col-md-10 col-8">
                    <input class="form-control" @if (Auth::user()->hasRole('user')) readonly @endif
                        value="{{ Auth::user()->address }}" type="text" name="alamat_pengguna"
                        placeholder="masukkan alamat">
                </div>
            </div>

            <table class="table" id="myTable2">
                <thead>
                    <tr>
                        <th scope="col" style="width: 1rem">No</th>
                        {{-- <th scope="col">Kode</th> --}}
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($gejala as $g)
                        <tr>

                            <th>{{ $i++ }}</th>
                            {{-- <td scope="row">{{ $g->kode_gejala }}</td> --}}
                            <td @if ($i == 2) id="step1" class="highlight" @endif>{{ $g->nama_gejala }}
                            </td>
                            <td scope="row">
                                <select name="cf[]" class="form-control cf3"
                                    @if ($i == 2) id="step2" class="highlight" @endif>
                                    <option value="">Pilih jika sesuai</option>
                                    @foreach ($term as $k)
                                        <option
                                            value="{{ $g->kode_gejala }}*{{ $g->nama_gejala }}*{{ $k['nilai'] }}*{{ $k['deskripsi'] }}">
                                            {{ $k['deskripsi'] }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


            {{-- <div class="my-3 btn-diagnosims" style="gap:8px;">
                <button type="submit" class="text-white btn btn-lg btn-success ">
                    <i class="micon bi bi-clipboard-pulse"></i> Mulai Diagnosis
                </button>

            </div> --}}
            <div style="position: fixed; bottom: 2em; right: 3em; z-index: 9999; display: flex; align-items: center;"
                id="step3" class="highlight">
                {{-- <span
                    style="margin-right: 5px; font-weight: bold; font-size: 1em; color: white; background-color: rgba(0, 123, 255, 0.8); padding: 5px 10px; border-radius: 5px;">
                    Mulai Pengecekan
                </span> --}}
                <button type="submit" class="p-3 shadow btn btn-lg btn-info rounded-circle">
                    {{-- <i class="bi bi-clipboard-pulse" style="font-size: 3em;"></i> --}}
                    <img width="50" height="50" src={{ asset('assets/vendors/images/diagnosis.gif') }} />
                </button>
            </div>


    </form>

    </div>

    <!-- basic table  End -->
    @role('user')
        @push('scripts')
            <script>
                startIntro()

                function startIntro() {
                    const intro = introJs();
                    intro.setOptions({
                        steps: [{
                                title: "Welcome",
                                intro: "Hallo Pengguna👋! berikut merupakan tahapan - tahapan proses diagnosa",
                            },
                            {
                                title: "Langkah Pertama",
                                element: "#step1",
                                intro: "Pilih gejala yang sedang anda alami",
                                position: "bottom",
                            },
                            {
                                title: "Langkah Kedua",
                                element: "#step2",
                                intro: "Pilih salah satu kondisi sesuai gejala yang anda alami ",
                                position: "bottom",
                            },
                            {
                                title: "Langkah Terakhir",
                                element: "#step3",
                                intro: "Klik tombol ini Untuk memulai proses diagnosa",
                                position: "left",
                            },
                        ],
                        // showStepNumbers: true,
                        skipLabel: "Skip",
                        nextLabel: "Berikutnya",
                        prevLabel: "Sebelumnya",
                        doneLabel: "Selesai",
                        dontShowAgain: true,
                        dontShowAgainLabel: "jangan tampilkan lagi",
                        scrollPadding: "120"

                    });
                    intro.start();
                }
            </script>
        @endpush
    @endrole
@endsection
