<?php

namespace App\Repositories\Rule; // Menentukan namespace agar class ini bisa di-autoload sesuai struktur PSR-4

use App\Models\Rule; // Model Eloquent untuk tabel rule (basis pengetahuan)
use App\Repositories\Rule\RuleInterface; // Interface repository yang diimpor, namun tidak diimplementasikan
use Illuminate\Database\Eloquent\Collection; // Untuk tipe kembalian data koleksi
use Illuminate\Support\Facades\DB; // Untuk query raw SQL (dipakai di bagian komentar bawah)

class RuleRepository
{

    public function __construct(private Rule $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $data = $this->model->orderBy('kode_penyakit')->get(); // Sekarang hanya mengambil semua data rule dan mengurutkan berdasarkan kode_penyakit
        return $data;
    }
    public function create($data)
    {
        return $this->model->create($data); // Menambahkan data rule baru
    }

    public function find($id)
    {
        return  $this->model->where('kode_pengetahuan', $id)->get(); // Jika `kode_pengetahuan` unik, lebih baik pakai `first()` bukan `get()`, atau langsung `find($id)` jika ID utama
    }

    public function where($filter): Collection
    {
        return  $this->model->where('kode_penyakit', $filter)->get(); // Ambil semua rule berdasarkan kode_penyakit
    }


    public function whereSelected($id, $selected): Collection
    {
        return $this->model->where('kode_penyakit', $id)->whereNotIn('id', $selected)->get(); // Ambil semua rule untuk penyakit tertentu kecuali yang ada dalam array $selected
    }

    public function whereIn($id, $filter)
    {
    // Melakukan pencarian data pada model berdasarkan kondisi "whereIn".
    // Parameter $id di sini sebenarnya adalah nama kolom (misalnya 'kode_gejala').
    // Parameter $filter adalah array berisi nilai-nilai yang ingin dicari pada kolom tersebut.
    // Kemudian hasilnya diurutkan berdasarkan 'kode_penyakit'
        return  $this->model->whereIn($id, $filter)->orderBy('kode_penyakit')->get();
    }

    public function update($request, $id)
    {
        $data = $this->model->find($id); // Mengambil satu data dari database berdasarkan ID (biasanya primary key).
        // Memperbarui atribut data dengan nilai dari request (array atau object).
        $data->kode_penyakit = $request['kode_penyakit'];
        $data->kode_gejala = $request['kode_gejala'];
        $data->cf_pakar = $request['mb_pakar'] - $request['md_pakar']; // Menghitung nilai CF dari MB - MD
        $data->mb_pakar = $request['mb_pakar'];
        $data->md_pakar = $request['md_pakar'];
        return $data->save(); // Menyimpan perubahan ke database.
    }
    public function updateRule($data)
    {
        // Fungsi ini tidak benar-benar meng-*update*, tapi justru membuat data baru.
        // Menggunakan create() dari Eloquent untuk menyimpan data baru ke tabel terkait.
        return $this->model->create($data);
    }
    public function delete($id): int
    {
        // Menghapus data berdasarkan ID (biasanya primary key).
        // Menggunakan destroy() yang mengembalikan jumlah baris yang berhasil dihapus.
        return  $this->model->destroy($id);
    }
}
