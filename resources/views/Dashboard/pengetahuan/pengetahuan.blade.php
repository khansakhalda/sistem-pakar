@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Kelola Basis Pengetahuan</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Pengetahuan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold" style="color: #ff9800;">Daftar Pengetahuan Pakar</h5>
        <a href="{{ route('pengetahuan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Pengetahuan
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable2">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Penyakit</th>
                    <th>Gejala</th>
                    <th>MB</th>
                    <th>MD</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $rule)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rule->desease->nama_penyakit }}</td>
                    <td>
                        <span class="badge text-white" style="background-color: #ff9800;">{{ $rule->indication->nama_gejala }}</span>
                    </td>
                    <td>{{ $rule->mb_pakar }}</td>
                    <td>{{ $rule->md_pakar }}</td>
                    <td>
                        <div class="d-flex flex-wrap" style="gap: 6px;">
                            <a href="{{ route('pengetahuan.edit', $rule->kode_pengetahuan) }}"
                               class="btn btn-warning btn-sm text-white">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <form method="POST" action="{{ route('pengetahuan.destroy', $rule->kode_pengetahuan) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
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
</div>
@endsection
