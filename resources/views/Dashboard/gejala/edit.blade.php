@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Gejala</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href={{ route('gejala.index') }}>Gejala</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Gejala
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2em">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit Gejala</h4>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action={{ route('gejala.update', $data->kode_gejala) }} method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kode Gejala</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" name="kode_gejala" type="text" readonly value={{ $data->kode_gejala }}>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nama Gejala</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="nama_gejala" value="{{ $data->nama_gejala }}">
                </div>
            </div>



            <div class="d-flex flex-row-reverse" style="gap:8px;">
                <button class="btn btn-large btn-info " type="submit">Simpan</button>
                <a href={{ route('gejala.index') }} class="btn btn-large btn-dark ">Batal</a>
            </div>


        </form>

    </div>

    <!-- basic table  End -->
@endsection
