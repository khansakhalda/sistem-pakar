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
                        <li class="breadcrumb-item active" aria-current="page">
                            Gejala
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2em">
        <div class="clearfix mb-12">
            <div class="pull-left">
                <h4 class="text-blue h4">Daftar Gejala</h4>

            </div>
            <div class="pull-right">
                <button data-toggle="modal" data-target="#bd-example-modal-lg" class="btn btn-large btn-success mb-4"> +
                    Tambah
                    Gejala </button>

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

        <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <form action={{ route('gejala.store') }} method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Tambah Gejala
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Kode Gejala</label>
                                <input type="text" name="kode_gejala" class="form-control" aria-describedby="emailHelp">

                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Gejala</label>
                                <input type="text" name="nama_gejala" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-info">
                                Tambah Gejala
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $gejala)
                    <tr>
                        <th scope="row">{{ $gejala->kode_gejala }}</th>
                        <td>{{ $gejala->nama_gejala }}</td>
                        <td>
                            <div class="d-flex flex-wrap" style="gap:5px;">

                                <a href={{ route('gejala.edit', $gejala->kode_gejala) }} type="button"
                                    class="btn btn-info text-white">
                                    <i class="bi bi-pencil-square"></i> &nbsp; Edit &nbsp;
                                </a>
                                <form method="POST" action={{ route('gejala.destroy', $gejala->kode_gejala) }}>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('apakah yakin?')" type="submit"
                                        class="btn btn-danger text-white ">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

    <!-- basic table  End -->
@endsection
