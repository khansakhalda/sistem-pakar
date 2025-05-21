<?php

namespace App\Repositories\Indication; // Menentukan namespace untuk mengatur struktur kode dan autoload class ini secara otomatis.

use App\Models\Indication; // Mengimpor model Eloquent untuk tabel gejala (indication).
use App\Repositories\Indication\indicationInterface; // Mengimpor interface
use Illuminate\Database\Eloquent\Collection; // Digunakan sebagai tipe data untuk method yang mengembalikan banyak hasil.


class IndicationRepository // Kelas repository untuk logika CRUD pada data gejala.
{

    public function __construct(private Indication $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return  $this->model->all(); // Mengambil semua data gejala dalam bentuk koleksi Eloquent.
    }
    public function create($data)
    {
        return $this->model->create($data); // Menambahkan data gejala baru.
    }
    public function find($id): Collection
    {
        return  $this->model->where('kode_gejala', $id)->get();
        // Mengambil data berdasarkan kode_gejala, namun hasilnya Collection (bisa banyak).
    }
    public function update($request, $id)
    {
        $data =  $this->model->find($id); // Cari berdasarkan ID (biasanya primary key).
        $data->nama_gejala = $request['nama_gejala']; // Update nama gejala.
        return  $data->save(); // Simpan perubahan.
    }
    public function delete($id): int
    {
        return  $this->model->destroy($id);
        // Menghapus data berdasarkan ID, mengembalikan jumlah baris yang dihapus.
    }
}
