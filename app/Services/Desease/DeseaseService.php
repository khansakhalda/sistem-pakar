<?php

namespace App\Services\Desease; // Menentukan namespace untuk class ini agar sesuai dengan struktur folder dan PSR-4 autoloading

use App\Repositories\Desease\DeseaseRepository;
// Mengimpor repository penyakit untuk digunakan dalam service
// Repository ini bertanggung jawab untuk mengakses data penyakit dari database
use App\Services\Base\BaseService; // Mengimpor interface BaseService yang menjadi kontrak (template method) untuk semua service
use Illuminate\Database\Eloquent\Collection; // Mengimpor class Collection untuk menunjukkan tipe return data dari metode yang mengembalikan banyak data

class DeseaseService implements BaseService
// Mendeklarasikan class DeseaseService yang mengimplementasikan interface BaseService
// Ini memastikan class memiliki method getAll, find, destroy
{

    public function __construct(private DeseaseRepository $model)
    // Constructor dengan promoted property PHP 8 untuk menyimpan instance repository Desease
    {
    }

    public function  getAll(): Collection
    {
        return $this->model->all(); // Mengembalikan semua data penyakit dari repository dalam bentuk koleksi
    }
    public function store($request)
    {
        $validated  = $request->validated(); // Memanggil validasi dari Form Request agar hanya data valid yang diproses
        $validated = $request->safe()
            ->only(['nama_penyakit', 'detail_penyakit']); // Mengambil hanya data yang diizinkan (whitelist)

        return $this->model->create($validated); // Mengirim data yang sudah divalidasi dan disaring ke repository untuk disimpan
    }

    public function find($id): Collection
    {
        return $this->model->find($id);
        // Mencari data penyakit berdasarkan ID menggunakan repository
        // Mengembalikan hasil dalam bentuk koleksi (meskipun idealnya object tunggal atau nullable)
    }
    public function update($request, $id)
    {
        $validated  = $request->validated(); // Melakukan validasi terhadap inputan form
        $validated = $request->safe()
            ->only(['nama_penyakit', 'detail_penyakit']); // Mengambil hanya data yang aman dan diizinkan
        return $this->model->update($validated, $id); // Meneruskan data ke repository untuk update berdasarkan ID
    }
    public function destroy($id)
    {
        return $this->model->delete($id);
        // Menghapus data penyakit berdasarkan ID
    }
}
