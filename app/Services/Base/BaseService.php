<?php

namespace App\Services\Base;
// Menetapkan namespace untuk file ini, yaitu di folder "App/Services/Base".
// Namespace membantu pengorganisasian dan autoloading class/interface dalam aplikasi.

interface BaseService
// Mendeklarasikan sebuah interface bernama "BaseService".
// Interface ini digunakan untuk menentukan kontrak/metode standar yang harus dimiliki oleh setiap service turunan.
// Cocok dipakai dalam arsitektur service-repository pattern.
{
    public function getAll();
    // Method abstrak untuk mengambil semua data.
    // Implementasi di class turunan biasanya akan memanggil repository->all().
    public function find($id);
    // Method abstrak untuk mengambil satu data berdasarkan ID atau identifier lainnya.
    // Implementasi umumnya repository->find($id).
    public function destroy($id);
    // Method abstrak untuk menghapus data berdasarkan ID.
    // Implementasi biasanya repository->delete($id).
}
