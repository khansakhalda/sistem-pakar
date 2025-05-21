<?php

namespace App\Repositories\Desease; // Namespace tempat repository ini berada, digunakan untuk autoloading

use App\Models\Desease; // Mengimpor model Eloquent 'Desease'
use App\Repositories\Desease\DeseaseInterface; // Mengimpor interface repository, walau tidak digunakan di class (seharusnya implements DeseaseInterface)
use Illuminate\Database\Eloquent\Collection; // Mengimpor Collection class dari Eloquent untuk typing


class DeseaseRepository // Kelas implementasi repository untuk model 'Desease'
{

    public function __construct(private Desease $model) // Constructor injection untuk model, fitur PHP 8+. Variabel $model otomatis diisi dengan instance Desease.
    {
        $this->model = $model; // Redundant, karena sudah dideklarasikan `private`, bisa dihapus
    }

    // Mengembalikan semua data penyakit dalam bentuk Collection
    public function all(): Collection
    {
        return  $this->model->all();
    }

    // Membuat data penyakit baru dengan data array
    public function create($data)
    {
        return $this->model->create($data);
    }

    // Mencari penyakit berdasarkan 'kode_penyakit', dan mengembalikannya dalam bentuk Collection
    public function find($id): Collection
    {
        return  $this->model->where('kode_penyakit', $id)->get();
    }

    // Mengupdate data penyakit berdasarkan ID dengan data dari request (biasanya array)
    public function update($request, $id)
    {
        $data =  $this->model->find($id); // Cari data berdasarkan ID
        $data->nama_penyakit = $request['nama_penyakit']; // Update kolom nama
        $data->detail_penyakit = $request['detail_penyakit']; // Update kolom detail
        return  $data->save(); // Simpan perubahan ke database
    }
    
    // Menghapus data penyakit berdasarkan ID, mengembalikan jumlah data yang dihapus
    public function delete($id): int
    {
        return  $this->model->destroy($id);
    }
}
