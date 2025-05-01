@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Pengetahuan</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href={{ route('pengetahuan.index') }}>Pengetahuan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tambah Pengetahuan
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2rem">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4"> Tambah Pengetahuan</h4>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action="{{ route('pengetahuan.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Nama Penyakit :</label>
                <div class="col-sm-12 col-md-9">
                    <select id="select1" name="kode_penyakit" class="form-control">

                        <option value="">Pilih Penyakit</option>
                        @foreach ($penyakit as $p)
                            <option value="{{ $p->kode_penyakit }}">{{ $p->nama_penyakit }}</option>
                        @endforeach
                        {{-- @if (!$ip)
                            <option>Penyakit Sudah Terpakai / Tidak ada</option>
                        @endif --}}



                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Pilih Gejala :</label>
                <div class="col-sm-12 col-md-9">
                    <!-- Dropdown -->
                    {{-- <div class="checkbox-dropdown"> --}}
                    {{-- <ul class="checkbox-dropdown-list">
                            @foreach ($gejala as $g)
                                <li>
                                    <label> <input type="checkbox" value="{{ $g->kode_gejala }}" name="kode_gejala[]">
                                        {{ $g->nama_gejala }} </label>
                                </li>
                            @endforeach
                        </ul> --}}
                    <select id="select2" name="kode_gejala" class="form-control">
                        <option value="">Pilih Gejala</option>

                        {{-- @foreach ($gejala as $p) --}}
                        {{-- @if (!$selectedIndication->contains($p->kode_gejala))
                          
                            <option value="{{ $p->kode_gejala }}">{{ $p->nama_gejala }}</option>
                        @endif --}}

                        {{-- <option value="{{ $p->kode_gejala }}">{{ $p->nama_gejala }}</option>
                        @endforeach --}}
                        {{-- @if (!$ig)
                            <option>Gejala Sudah Terpakai / Tidak ada</option>
                        @endif --}}
                    </select>
                    {{-- </div> --}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">MB (Measure of Believe)
                    {{-- <i
                        class="bi bi-patch-question text-lg text-danger"></i> --}}
                    <i type="button" class="icon-copy fa fa-info-circle text-success" data-toggle="popover"
                        data-placement="bottom" title="(MB) Measure of Belief "
                        data-content="Measure of Belief (Mb) dalam sistem pakar merujuk pada seberapa kuatnya kepercayaan seorang pakar terhadap kebenaran dari hasil yang diberikan oleh sistem. Sebagai contoh, jika seorang ahli memiliki Mb yang tinggi terhadap diagnosis penyakit yang diberikan oleh sistem pakar medis, maka dia akan memiliki keyakinan yang besar terhadap keakuratan diagnosis tersebut. Skala 0 sampai 1 digunakan di sini, di mana 0 menunjukkan ketidakpercayaan total pada hasil yang diberikan dan 1 menunjukkan keyakinan total pada kebenaran hasil tersebut."></i>
                    :</label>

                <div class="col-sm-12 col-md-9">
                    {{-- <select name="mb_pakar" class="form-control" id="cfa">
                        @foreach ($skala as $k)
                            <option value="{{ $k['nilai'] }}">{{ $k['nilai'] }}</option>
                        @endforeach
                     
                    </select> --}}
                    <input class="form-control" step="any" value="1" min="0" max="1" type="number"
                        name="mb_pakar">
                </div>
            </div>
            <div class="form-group row pb-30">
                <label class="col-sm-12 col-md-3 col-form-label">Md (Measure of Disbelief) <i type="button"
                        data-placement="bottom" class="icon-copy fa fa-info-circle text-success" data-toggle="popover"
                        title="MD (Measure of disbelief)"
                        data-content="MD (Measure of disbelief) adalah cara untuk mengukur seberapa besar keraguan seseorang terhadap keakuratan informasi yang diberikan oleh sistem pakar. Misalnya, jika seorang dokter memiliki skor MD yang tinggi terhadap rekomendasi pengobatan yang diberikan oleh sistem pakar medis, maka dia mungkin meragukan keefektifan pengobatan yang disarankan oleh sistem tersebut. Skala 0 sampai 1 digunakan di sini, di mana 0 menunjukkan kepercayaan total pada informasi yang diberikan dan 1 menunjukkan keraguan total terhadap informasi tersebut.

                        "></i>

                    :</label>
                <div class="col-sm-12 col-md-9">
                    {{-- <select name="md_pakar" class="form-control" id="cf2a">
                   
                        @foreach ($skala->reverse() as $k)
                            <option value="{{ $k['nilai'] }}">{{ $k['nilai'] }} </option>
                        @endforeach
                    </select> --}}
                    <input class="form-control" step="any" type="number" value="0" name="md_pakar">

                </div>
            </div>
            <div class="d-flex flex-row-reverse" style="gap:8px;">

                <button class="btn btn-large btn-info " type="submit">Tambah</button>

                <a href={{ route('pengetahuan.index') }} class="btn btn-large btn-dark ">Batal
                </a>
            </div>

        </form>

    </div>

    <!-- basic table  End -->
    @push('scripts')
        <script>
            // Event listener untuk perubahan nilai di elemen select pertama
            $('#select1').change(function() {
                var selectedValue = $(this).val();

                // Mengirimkan permintaan AJAX
                $.ajax({
                    url: '/get-data', // Rute yang ditangani oleh metode controller
                    method: 'GET',
                    data: {
                        selectedValue: selectedValue
                    },
                    success: function(response) {
                        console.log(response)
                        // Memperbarui elemen select kedua dengan data yang diterima
                        $('#select2').empty();
                        $.each(response, function(key, value) {
                            $('#select2').append('<option value="' + value.kode_gejala + '">' +
                                value
                                .nama_gejala +
                                '</option>');
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
