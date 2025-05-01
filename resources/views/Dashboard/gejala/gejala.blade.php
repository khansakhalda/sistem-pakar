@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Kelola Data Gejala</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Gejala</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold" style="color: #ff9800;">Daftar Gejala</h5>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahGejala">
            + Tambah Gejala
        </button>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $gejala)
                <tr>
                    <td>{{ $gejala->kode_gejala }}</td>
                    <td>{{ $gejala->nama_gejala }}</td>
                    <td>
                        <div class="d-flex flex-wrap" style="gap: 10px;">
                            <a href="{{ route('gejala.edit', $gejala->kode_gejala) }}"
                               class="btn btn-warning btn-sm text-white">
                               <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <!-- Tombol untuk membuka modal konfirmasi -->
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $gejala->kode_gejala }}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="hapusModal{{ $gejala->kode_gejala }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title fw-bold">Konfirmasi Hapus</h5>
                                <button type="button" class="btn text-white border-0" data-bs-dismiss="modal" aria-label="Tutup" style="font-size: 1.5rem;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus gejala <strong>{{ $gejala->nama_gejala }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form method="POST" action="{{ route('gejala.destroy', $gejala->kode_gejala) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Gejala -->
<div class="modal fade" id="modalTambahGejala" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('gejala.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title fw-bold">Tambah Gejala</h5>
                    <button type="button" class="btn text-white border-0" data-bs-dismiss="modal" aria-label="Tutup" style="font-size: 1.5rem;">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_gejala" class="form-label fw-semibold">Nama Gejala</label>
                        <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" placeholder="Contoh: Batuk Kering, Demam, dll">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection
