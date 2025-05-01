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



        <table class="table" id="myTable2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th style="width:1rem;">Penyakit</th>
                    <th style="width:10rem;">Gejala</th>
                    <th>MB</th>
                    <th>MD</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($data as $rule)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $rule->desease->nama_penyakit }}</td>
                        <td>
                            {{-- {{ $rule->indication->nama_gejala }} --}}
                            <div class="d-flex flex-wrap" style="gap:1px;">

                                {{-- @foreach ($rule->gejala_array as $k) --}}
                                <button class="p-2">{{ $rule->indication->nama_gejala }}</button>
                                {{-- @endforeach --}}
                            </div>

                        </td>
                        <td>{{ $rule->mb_pakar }}
                        </td>
                        <td>{{ $rule->md_pakar }}
                        </td>
                        <td>
                            <div class="d-flex flex-wrap" style="gap:5px;">

                                <a href={{ route('pengetahuan.edit', $rule->kode_pengetahuan) }}
                                    class="btn btn-info text-white">
                                    <i class="bi bi-pencil-square"></i> &nbsp; Edit &nbsp;
                                </a>
                                <form method="POST" action={{ route('pengetahuan.destroy', $rule->kode_pengetahuan) }}>
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
