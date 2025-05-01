@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #ff9800;">Kelola Data Penyakit</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" style="color: #ff9800;" aria-current="page">Penyakit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-30 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold" style="color: #ff9800;">Daftar Penyakit</h5>
        <a href="{{ route('penyakit.create') }}" class="btn btn-success">+ Tambah Penyakit</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Informasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $penyakit)
                <tr>
                    <td>{{ $penyakit->kode_penyakit }}</td>
                    <td>{{ $penyakit->nama_penyakit }}</td>
                    <td>
                        <button class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $penyakit->kode_penyakit }}">
                            <i class="bi bi-eye-fill"></i> Tampilkan
                        </button>
                    </td>
                    <td>
                        <div class="d-flex flex-wrap" style="gap: 10px;">
                            <a href="{{ route('penyakit.edit', $penyakit->kode_penyakit) }}"
                               class="btn btn-sm text-white" style="background-color: #ffc107;">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $penyakit->kode_penyakit }}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Detail -->
                <div class="modal fade" id="detailModal{{ $penyakit->kode_penyakit }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title fw-bold">Detail Penyakit: {{ $penyakit->nama_penyakit }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                {!! $penyakit->detail_penyakit !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="hapusModal{{ $penyakit->kode_penyakit }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #ffc107; color: #212529;">
                                <h5 class="modal-title fw-bold">Konfirmasi Hapus</h5>
                                <button type="button" class="btn text-dark border-0" data-bs-dismiss="modal"
                                        aria-label="Tutup" style="font-size: 1.5rem;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus penyakit <strong>{{ $penyakit->nama_penyakit }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form method="POST" action="{{ route('penyakit.destroy', $penyakit->kode_penyakit) }}">
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
