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
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pengetahuan
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
                <h4 class="text-blue h4">Daftar Pengetahuan</h4>

            </div>
            <div class="pull-right">
                <a href="{{ route('pengetahuan.create') }}" class="btn btn-large btn-success mb-4"> + Tambah Pengetahuan
                </a>

            </div>

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif



        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th class="text-center" scope="col">Penyakit</th>
                    <th class="text-right" scope="col">Detail</th>
                </tr>
            </thead>

        </table>
        <?php
        $no = 1;
        $tmp = '';
        ?>
        @foreach ($data as $key => $rule)
            <div class="py-2 d-flex justify-content-lg-between pl-2" style="border-bottom: 1px solid rgb(222,226,230)">
                <span>{{ $no++ }}</span>
                <p class="pl-3">{{ $key }}</p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#a{{ $no }}"
                    aria-expanded="false" aria-controls="collapseExample">
                    Lihat Detail
                </button>

            </div>

            <div class="collapse" id="a{{ $no }}">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Penyakit</th>
                            <th scope="col">Gejala</th>
                            <th scope="col">MB</th>
                            <th scope="col">MD</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rule as $r)
                            <tr>
                                <td>{{ $r->nama_penyakit }}</td>
                                <td>
                                    {{-- {{ $r->indication->nama_gejala }} --}}
                                    <div class="d-flex flex-wrap" style="gap:1px;">

                                        {{-- @foreach ($r->gejala_array as $k) --}}
                                        <button class="badge badge-secondary">{{ $r->indication->nama_gejala }}</button>
                                        {{-- @endforeach --}}
                                    </div>

                                </td>
                                <td>{{ $r->mb_pakar }}
                                </td>
                                <td>{{ $r->md_pakar }}
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap" style="gap:5px;">

                                        <a href={{ route('pengetahuan.edit', $r->kode_pengetahuan) }}
                                            class="btn btn-info text-white">
                                            <i class="bi bi-pen"></i> &nbsp; Edit &nbsp;
                                        </a>
                                        <form method="POST"
                                            action={{ route('pengetahuan.destroy', $r->kode_pengetahuan) }}>
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
        @endforeach
    </div>


    <!-- basic table  End -->
@endsection
