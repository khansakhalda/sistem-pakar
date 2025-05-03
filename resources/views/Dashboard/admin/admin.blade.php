@extends('Dashboard.layout.app')

@push('styles')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .breadcrumb a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-1 fw-bold" style="color: #0d6efd;">Kelola Data Pengguna</h4>
            <p class="text-muted small">Berikut adalah daftar pengguna yang terdaftar dalam sistem SIDINYAM.</p>
            <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white px-3 py-2 rounded shadow-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">Beranda</a>
        </li>
        <li class="breadcrumb-item active" style="color: #0d6efd;" aria-current="page">Daftar Pengguna</li>
    </ol>
</nav>

        </div>
    </div>
</div>

<div class="card shadow-sm rounded-lg mt-3 mb-5">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-dark mb-0">Daftar Pengguna</h5>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($data as $admin)
                        @if ($admin->id != Auth::user()->id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>
                                    <div class="d-flex align-items-center" style="gap: 0.75rem;">
                                        <!-- Tombol Ubah -->
                                        <a href="{{ route('data-admin.edit', $admin->id) }}" 
                                           class="btn btn-sm text-white" style="background-color: #ff9800;"> 
                                            <i class="bi bi-pencil"></i> Ubah
                                        </a>

                                        <!-- Tombol Hapus (Trigger Modal) -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" 
                                                style="border-radius: 10px;" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#confirmDeleteModal{{ $admin->id }}">
                                            <i class="bi bi-trash3"></i> Hapus
                                        </button>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmDeleteModal{{ $admin->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $admin->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="modal-title text-white" id="confirmDeleteLabel{{ $admin->id }}">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn text-white p-0 border-0 bg-transparent" 
                        data-bs-dismiss="modal" 
                        aria-label="Tutup"
                        style="font-size: 1.5rem;">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pengguna <strong>{{ $admin->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="POST" action="{{ route('data-admin.destroy', $admin->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection
