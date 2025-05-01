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
                            Edit Pengetahuan
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Pengetahuan</h4>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action="{{ route('pengetahuan.update', $data->kode_pengetahuan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Nama
                    Penyakit<small> ({{ $data->desease->nama_penyakit }})</small> :</label>
                <div class="col-sm-12 col-md-9">
                    <input class="form-control" type="text" readonly value="{{ $data->desease->kode_penyakit }}"
                        name="kode_penyakit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">Pilih Gejala :</label>
                <div class="col-sm-12 col-md-9">
                    <!-- Dropdown -->
                    {{-- <div class="checkbox-dropdown">
                        Pilih Gejala
                        <ul class="checkbox-dropdown-list">
                            @foreach ($gejala as $g)
                                <li>
                                    <label> <input type="checkbox" value="{{ $g->kode_gejala }}"
                                            @if ($data->kode_gejala == $g->kode_gejala) checked @endif name="kode_gejala[]" />
                                        {{ $g->nama_gejala }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <select name="kode_gejala" class="form-control">
                        {{-- <option>Pilih Gejala</option> --}}
                        @foreach ($gejala as $g)
                            @if (!$selected->contains($g->kode_gejala) || $data->kode_gejala == $g->kode_gejala)
                                <option @if ($data->kode_gejala == $g->kode_gejala) selected @endif value="{{ $g->kode_gejala }}">
                                    {{ $g->nama_gejala }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-12 col-md-3 col-form-label">MB (Measure of Believe)
                    {{-- <i
                        class="bi bi-patch-question text-lg text-danger"></i> --}}
                    <i type="button" class="icon-copy fa fa-info-circle text-success" data-toggle="popover"
                        data-placement="bottom" title="(MB) Measure of Belief "
                        data-content="Measure of Belief (Mb) dalam sistem pakar merujuk pada seberapa kuatnya kepercayaan seorang pakar terhadap kebenaran dari hasil yang diberikan oleh sistem. Sebagai contoh, jika seorang ahli memiliki Mb yang tinggi terhadap diagnosis penyakit yang diberikan oleh sistem pakar medis, maka dia akan memiliki keyakinan yang besar terhadap keakuratan diagnosis tersebut."></i>
                    :</label>

                <div class="col-sm-12 col-md-9">
                    {{-- <select name="mb_pakar" class="form-control" id="cfa">
                     
                        @foreach ($skala->reverse() as $k)
                            <option @if ($k['nilai'] == $data->mb_pakar) selected @endif value="{{ $k['nilai'] }}">
                                {{ $k['nilai'] }} </option>
                        @endforeach
                    </select> --}}
                    <input class="form-control" step="any" value="{{ $data->mb_pakar }}" min="0" max="1"
                        type="number" name="mb_pakar">
                </div>
            </div>
            <div class="form-group
                        row pb-30">
                <label class="col-sm-12 col-md-3 col-form-label">Md (Measure of Disbelief) <i type="button"
                        data-placement="bottom" class="icon-copy fa fa-info-circle text-success" data-toggle="popover"
                        title="MD (Measure of disbelief)"
                        data-content="MD (Measure of disbelief) adalah seberapa besar keraguan seorang ahli terhadap keakuratan informasi yang diberikan oleh sistem pakar. Contohnya, jika seorang dokter memilikimeasure of disbelief yang tinggi terhadap rekomendasi pengobatan yang diberikan oleh sistem pakar medis, maka dia mungkin meragukan keefektifan pengobatan yang disarankan oleh sistem tersebut."></i>

                    :</label>

                <div class="col-sm-12 col-md-9">

                    {{-- <select name="md_pakar" class="form-control" id="cf2a">

                        @foreach ($skala->reverse() as $k)
                            <option @if ($k['nilai'] == $data->md_pakar) selected @endif value="{{ $k['nilai'] }}">
                                {{ $k['nilai'] }} </option>
                        @endforeach
                    </select> --}}
                    <input class="form-control" step="any" value="{{ $data->md_pakar }}" min="0" max="1"
                        type="number" name="md_pakar">
                </div>
            </div>
            <div class="d-flex flex-row-reverse" style="gap:8px;">
                <button class="btn btn-large btn-info " type="submit">Simpan</button>
                <a href={{ route('pengetahuan.index') }} class="btn btn-large btn-dark ">Batal</a>
            </div>






            {{-- <button class="save-button">Simpan</button> --}}



        </form>

    </div>

    <!-- basic table  End -->
@endsection
