@extends('Dashboard.layout.app')

@section('content')
    <div class="xs-pd-10-1 pd-ltr-10">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="title">
                        <h4>Diagnosis</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href={{ route('dashboard') }}>Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Riwayat Diagnosis
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <!-- basic table  Start -->

        <div class=" mb-30 pd-20 card-box" style="margin-top: -1.2em;">
            <div class="clearfix mb-12">
                <div class="pull-left">
                    <h4 class="text-blue h4">Riwayat Diagnosis</h4>
                    <p class="text-secondary " style="margin-top: -0.5rem"><small>Daftar seluruh diagnosa penyakit yang
                            sudah
                            dilakukan</small></p>
                </div>
                @role('admin')
                    <div class="mb-1 pull-right">
                        <form method="POST" action={{ route('diagnosis-deleteAll') }}>
                            @csrf
                            <button onclick="return confirm('apakah yakin?')" type="submit" class="text-white btn btn-danger ">
                                <i class="bi bi-trash"></i> Hapus Semua
                            </button>
                        </form>
                    </div>
                @endrole
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @php
                $tableId = Auth::user()->hasRole('admin') ? 'myTable3' : 'myTable4';
            @endphp

            <table class="table" id="{{ $tableId }}">
                <thead>
                    <tr>
                        <th scope="col" style="width: 3rem">No</th>
                        <th scope="col">Tanggal diagnosa</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Diagnosa Penyakit</th>
                        <th scope="col">Nilai Keyakinan</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Hapus</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $diagnosis)
                        @if ($diagnosis->kode_pengguna == Auth::user()->id || Auth::user()->hasRole('admin'))
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ substr($diagnosis->created_at, 0, 10) }}</td>
                                <td scope="col" data-priority="1">{{ $diagnosis->nama_pengguna }}</td>
                                <td scope="col">{{ $diagnosis->age }} thn</td>
                                <td>{{ $diagnosis->desease->nama_penyakit }}</td>
                                <td>{{ number_format($diagnosis->nilai_akhir, 2) . '%' }}
                                </td>
                                <td>
                                    <a href="{{ route('diagnosis.show', $diagnosis->diagnosis_id) }}"
                                        class="text-white btn  btn-info">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    {{-- <a href="{{ route('diagnosis.show', $diagnosis->diagnosis_id) }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a> --}}

                                </td>
                                <td>
                                    <div class="flex-wrap d-flex" style="gap:5px;">


                                        <form method="POST"
                                            action={{ route('diagnosis.destroy', $diagnosis->diagnosis_id) }}>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('apakah yakin?')" type="submit"
                                                class="text-white btn btn-danger ">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
        @role('admin')
            <div class="pd-20 card-box " style="margin-top: -1.2rem">
                <h4 class="mb-4 text-center h4 text-secondary ">Persentase jumlah penyakit yang telah ter-diagnosa</h4>
                <div class="d-flex justify-content-center">

                    <canvas id="chart8" width="400" height="400"></canvas>
                </div>
            </div>
        @endrole
    </div>


    <!-- basic table  End -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Data chart dari PHP
            var chartData = {!! json_encode($chart->toArray()) !!};

            var labels = Object.keys(chartData); // Nama label untuk data
            var dataValues = Object.values(chartData); // Data nilai

            var ctx = document.getElementById('chart8').getContext('2d');

            var chart = new Chart(ctx, {
                type: 'doughnut', // Tipe chart yang digunakan
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#E7E9ED',
                            '#4BC0C0',
                            '#FF9F40',
                            '#FFCD56',
                            '#C9CBCF',
                            '#36A2EB',
                            '#FF6F61'
                        ],
                        borderColor: '#fff',
                        borderWidth: 1
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
                    },
                    maintainAspectRatio: false // Agar chart menyesuaikan dengan ukuran canvas
                }
            });
        </script>
    @endpush
@endsection
