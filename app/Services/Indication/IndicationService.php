<?php

namespace App\Services\Indication; // Menentukan namespace class ini berada di folder App\Services\Indication

use App\Repositories\Indication\IndicationRepository; // Mengimpor IndicationRepository yang digunakan untuk mengakses data gejala dari database
use App\Services\Base\BaseService; // Mengimpor BaseService sebagai kontrak method standar (getAll, find, destroy, dll.)
use Illuminate\Database\Eloquent\Collection; // Mengimpor Collection Eloquent sebagai tipe data kembalian untuk method yang mengembalikan banyak entri

class IndicationService implements BaseService
// Mendeklarasikan class IndicationService yang mengimplementasikan BaseService
// Artinya class ini harus menyediakan method: getAll(), find($id), destroy($id)
{

    public function __construct(private IndicationRepository $model)
    {
        // Constructor menggunakan fitur promoted properties PHP 8 untuk menyimpan instance repository ke properti $model
    }

    public function  getAll(): Collection
    {
        return $this->model->all();
        // Memanggil method `all()` dari repository untuk mengambil seluruh data gejala
        // Mengembalikan hasil dalam bentuk Collection
    }
    public function store($request)
    {
        $validated  = $request->validated(); // Memvalidasi input dari form request
        $validated = $request->safe()
            ->only(['nama_gejala']); // Mengambil hanya input yang aman dan relevan (whitelisting)

        return $this->model->create($validated); // Mengirim data ke repository untuk disimpan ke database
    }

    public function find($id): Collection
    {
        return $this->model->find($id);
        // Mengambil data gejala berdasarkan ID dari repository
        // Kembalian dalam bentuk Collection (meskipun idealnya 1 data, bukan Collection)
    }
    public function update($request, $id)
    {
        $validated  = $request->validated(); // Validasi data form
        $validated = $request->safe() // Ambil input yang aman
            ->only(['nama_gejala']);

        return $this->model->update($validated, $id); // Perbarui data di repository berdasarkan ID
    }
    public function destroy($id)
    {
        return $this->model->delete($id); // Hapus data gejala dari database menggunakan repository
    }
}
