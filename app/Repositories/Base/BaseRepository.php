<?php

namespace App\Repositories\Base; // Namespace untuk repositori dasar (base class/interface)

/**
 * Interface BaseRepository
 * 
 * Interface ini mendefinisikan kontrak umum untuk operasi CRUD standar.
 * Digunakan agar semua repository lain (misal UserRepository, DiagnosisRepository, dll)
 * mengikuti pola/metode yang konsisten.
 */

interface BaseRepository
{
    // Ambil semua data dari model.
    public function  all();
    public function  create($request); // Menyimpan data baru ke database.
    public function  find($id); // Mencari data berdasarkan ID.
    public function  update($request, $id); // Memperbarui data berdasarkan ID.
    public function  delete($id); // Menghapus data berdasarkan ID.
}
