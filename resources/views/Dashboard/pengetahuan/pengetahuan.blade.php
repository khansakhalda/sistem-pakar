@extends('Dashboard.layout.app')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-12">
            <div class="title">
                <h4 class="fw-bold" style="color: #0d6efd;">Kelola Basis Pengetahuan</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white px-3 py-2 shadow-sm rounded">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" style="color: #0d6efd;" aria-current="page">Pengetahuan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box pd-20 mb-5 mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-semibold" style="color: #0d6efd;">Daftar Pengetahuan Pakar</h5>
        <a href="{{ route('pengetahuan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Pengetahuan
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
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
                        <span class="badge text-white" style="background-color: #0d6efd;">
                            {{ $rule->indication->nama_gejala }}
                        </span>
                    </td>
                    <td>{{ $rule->mb_pakar }}</td>
                    <td>{{ $rule->md_pakar }}</td>
                    <td>
                        <div class="d-flex flex-wrap" style="gap: 10px;">
                            <a href="{{ route('pengetahuan.edit', $rule->kode_pengetahuan) }}"
                               class="btn btn-sm text-white" style="background-color: #ff9800;">
                                <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $rule->kode_pengetahuan }}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="hapusModal{{ $rule->kode_pengetahuan }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #0d6efd;">
                                <h5 class="modal-title fw-bold text-white">Konfirmasi Hapus</h5>
                                <button type="button" class="btn text-white border-0" data-bs-dismiss="modal"
                                        aria-label="Tutup" style="font-size: 1.5rem;">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body text-dark">
                                Apakah Anda yakin ingin menghapus pengetahuan
                                <strong>{{ $rule->desease->nama_penyakit }}</strong> - 
                                <strong>{{ $rule->indication->nama_gejala }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form method="POST" action="{{ route('pengetahuan.destroy', $rule->kode_pengetahuan) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white">Ya, Hapus</button>
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
