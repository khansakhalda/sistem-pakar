@extends('Dashboard.layout.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@section('content')
<div class="xs-pd-10-1 pd-ltr-10 mb-5">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h4 class="fw-bold" style="color: #007bff;">Data Riwayat Diagnosis</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white shadow-sm px-3 py-2 rounded">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" style="color: #007bff;" aria-current="page">Riwayat Pemeriksaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card-box pd-20 mb-30 mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-semibold" style="color: #007bff;">Riwayat Pemeriksaan Penyakit</h5>
                <p class="text-muted mb-0 small">Berikut merupakan riwayat hasil diagnosis yang pernah dilakukan</p>
            </div>
            @role('admin')
            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#hapusSemuaModal">
                <i class="bi bi-trash"></i> Hapus Semua
            </button>
            @endrole
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
        @endif

        @php $i = 1; $tableId = Auth::user()->hasRole('admin') ? 'myTable3' : 'myTable4'; @endphp

        <div class="table-responsive">
            <table class="table table-bordered" id="{{ $tableId }}">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pengguna</th>
                        <th>Usia</th>
                        <th>Hasil Diagnosis</th>
                        <th>Tingkat Keyakinan</th>
                        <th>Detail</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $diagnosis)
                        @if ($diagnosis->kode_pengguna == Auth::user()->id || Auth::user()->hasRole('admin'))
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ substr($diagnosis->created_at, 0, 10) }}</td>
                            <td>{{ $diagnosis->nama_pengguna }}</td>
                            <td>{{ $diagnosis->age }} thn</td>
                            <td>{{ $diagnosis->desease->nama_penyakit }}</td>
                            <td>{{ number_format($diagnosis->nilai_akhir, 2) . '%' }}</td>
                            <td>
                                <a href="{{ route('diagnosis.show', $diagnosis->diagnosis_id) }}"
                                   class="btn btn-sm text-white rounded" style="background-color: #ff9800;">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-danger rounded" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $diagnosis->diagnosis_id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <!-- Modal per item -->
                                <div class="modal fade" id="hapusModal{{ $diagnosis->diagnosis_id }}" tabindex="-1" aria-labelledby="labelHapus{{ $diagnosis->diagnosis_id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #007bff; color: #ffffff;">
                                                <h5 class="modal-title fw-bold text-white" id="labelHapus{{ $diagnosis->diagnosis_id }}">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="btn text-white border-0" data-bs-dismiss="modal" aria-label="Tutup" style="font-size: 1.5rem;"><i class="bi bi-x-lg"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus <strong>riwayat diagnosis ini?</strong><br>
                                                <span class="text-muted">Tindakan ini tidak dapat dibatalkan.</span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form method="POST" action="{{ route('diagnosis.destroy', $diagnosis->diagnosis_id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @role('admin')
    <div class="card-box pd-20 mt-3">
        <h5 class="text-center fw-semibold" style="color: #007bff;">Visualisasi Data Diagnosis</h5>
        <div class="d-flex justify-content-center">
            <div style="max-width: 380px; width: 100%;">
                <canvas id="chart8"></canvas>
            </div>
        </div>
    </div>
    @endrole
</div>

<!-- Modal Konfirmasi Hapus Semua -->
<div class="modal fade" id="hapusSemuaModal" tabindex="-1" aria-labelledby="hapusSemuaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #007bff; color: #ffffff;">
        <h5 class="modal-title fw-bold text-white" id="hapusSemuaLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn text-white border-0" data-bs-dismiss="modal" aria-label="Tutup" style="font-size: 1.5rem;"><i class="bi bi-x-lg"></i></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin <strong>menghapus semua riwayat diagnosis?</strong><br>
        <span class="text-muted">Tindakan ini tidak dapat dibatalkan.</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <form method="POST" action="{{ route('diagnosis-deleteAll') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Ya, Hapus Semua</button>
        </form>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var chartData = {!! json_encode($chart->toArray()) !!};
    var labels = Object.keys(chartData);
    var dataValues = Object.values(chartData);

    var ctx = document.getElementById('chart8').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: [
                    '#007bff', '#E91E63', '#FFEB3B', '#C2185B', '#4CAF50',
                    '#009688', '#FF7043', '#BDBDBD', '#8BC34A', '#9C27B0'
                ],
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'left',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
