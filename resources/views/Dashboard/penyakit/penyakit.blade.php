@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Penyakit</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Penyakit
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
                <h4 class="text-blue h4">Daftar Penyakit</h4>

            </div>
            <div class="pull-right">
                <a href={{ route('penyakit.create') }} class="mb-4 btn btn-large btn-success"> + Tambah Penyakit</a>

            </div>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col" style="width: 1rem">Kode</th>
                    <th>Nama</th>
                    <th>Informasi</th>
                    {{-- <th>Solusi</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $penyakit)
                    <div class="modal fade " id="detail{{ $penyakit->kode_penyakit }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header bg-warning ">
                                    <h4 class="modal-title " id="myLargeModalLabel">
                                        Detail Penyakit {{ $penyakit->nama_penyakit }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $penyakit->detail_penyakit !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal fade" id="solusi{{ $penyakit->kode_penyakit }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header ">
                                    <h4 class="modal-title" id="myLargeModalLabel">
                                        Solusi Penyakit {{ $penyakit->nama_penyakit }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $penyakit->solusi_penyakit !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <tr>
                        <th scope="row">{{ $penyakit->kode_penyakit }}</th>
                        <td>{{ $penyakit->nama_penyakit }}</td>

                        <td>
                            <button class="badge badge-secondary" data-toggle="modal"
                                data-target="#detail{{ $penyakit->kode_penyakit }}">
                                <i class="bi bi-eye-fill"></i> Tampilkan
                            </button>

                        </td>
                        {{-- <td>

                            <button class="badge badge-secondary" data-toggle="modal"
                                data-target="#solusi{{ $penyakit->kode_penyakit }}">
                                <i class="bi bi-eye-fill"></i> Tampilkan
                            </button>
                        </td> --}}
                        <td>
                            <div class="flex-wrap d-flex" style="gap:5px;">

                                <a href={{ route('penyakit.edit', $penyakit->kode_penyakit) }} type="button"
                                    class="text-white btn btn-info">
                                    <i class="bi bi-pencil-square"></i> &nbsp; Edit &nbsp;
                                </a>
                                <form method="POST" action={{ route('penyakit.destroy', $penyakit->kode_penyakit) }}>
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('apakah yakin?')" type="submit"
                                        class="text-white btn btn-danger ">
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
