<?php

namespace App\Repositories\Diagnosis; // Menentukan namespace agar class ini bisa di-autoload sesuai struktur PSR-4

use App\Models\Diagnosis; // Mengimpor model Diagnosis
use App\Repositories\Diagnosis\DiagnosisInterface; // Mengimpor interface yang seharusnya diimplementasikan, tapi tidak digunakan di class
use Illuminate\Database\Eloquent\Collection; // Untuk type hint kembalian data
use Illuminate\Support\Facades\DB; // DB facade untuk raw SQL
use App\Models\Rule; // Model Rule digunakan untuk operasi whereIn

class DiagnosisRepository
{

    public function __construct(private Diagnosis $model, private Rule $rule)
    {
        $this->model = $model; // Redundant: tidak perlu, karena sudah menggunakan promoted property PHP 8
    }

    public function all()
    {
        // Ambil data jumlah diagnosis per penyakit untuk ditampilkan dalam chart
        // Menggunakan pluck dan groupBy dengan sesuai dengan mode ONLY_FULL_GROUP_BY
        $chart = $this->model
            ->join('deseases', 'diagnoses.kode_penyakit', '=', 'deseases.kode_penyakit')
            ->select('deseases.nama_penyakit', DB::raw('count(*) as total'))
            ->groupBy('deseases.nama_penyakit')
            ->pluck('total', 'deseases.nama_penyakit'); // Menghasilkan array: [nama_penyakit => total]

        // Ambil semua data diagnosis terbaru
        $data = $this->model->latest()->get();

        return ['data' => $data, 'chart' => $chart];
    }

    public function create($data)
    {
        // Membuat data diagnosis baru dengan array data
        return $this->model->create($data);
    }

    public function find($id)
    {
        // Mengambil diagnosis berdasarkan diagnosis_id, tapi return-nya Collection, bukan object tunggal
        // Sebaiknya gunakan ->first() jika hanya satu data
        return  $this->model->where('diagnosis_id', $id)->get();
    }

    public function where($filter): Collection
    {
        // Mengambil semua diagnosis berdasarkan kode_penyakit
        return  $this->model->where('kode_penyakit', $filter)->get();
    }

    public function whereIn($id, $filter)
    {
        // Mengambil rule berdasarkan whereIn pada kolom tertentu, biasanya kode_gejala atau kode_penyakit
        // Disarankan ganti nama variabel $id menjadi $column untuk memperjelas maksudnya
        return  $this->rule->whereIn($id, $filter)->orderBy('kode_penyakit')->get();
    }

    public function update($request, $id)
    {
        $data = $this->model->find($id); // Cari data diagnosis berdasarkan ID

        // Update data diagnosis berdasarkan input
        $data->kode_penyakit = $request['kode_penyakit'];
        $data->kode_gejala = $request['kode_gejala'];
        $data->cf_pakar = $request['mb_pakar'] - $request['md_pakar']; // CF dihitung dari MB - MD
        $data->mb_pakar = $request['mb_pakar'];
        $data->md_pakar = $request['md_pakar'];
        return $data->save(); // Simpan ke database
    }
    public function updateRule($data)
    {
        return $this->model->create($data);
    }
    public function delete($id): int
    {
        // Menghapus diagnosis berdasarkan ID
        return  $this->model->destroy($id);
    }
    public function deleteAll()
    {
        // Menghapus semua diagnosis yang memiliki diagnosis_id
        // Bisa juga gunakan truncate() jika ingin kosongkan tabel sepenuhnya
        return  $this->model->whereNotNull('diagnosis_id')->delete();
    }
}
