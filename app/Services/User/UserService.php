<?php

namespace App\Services\User; // Namespace class ini sesuai struktur folder Laravel: App/Services/User

use App\Repositories\User\UserRepository; // Mengimpor class UserRepository yang berisi logika akses database untuk tabel "users"
use App\Services\Base\BaseService; // Mengimpor interface BaseService yang berisi kontrak method-method umum (getAll, find, destroy, dll.)


class  UserService implements BaseService // Mendefinisikan class UserService dan menyatakan bahwa class ini mengimplementasikan BaseService
{

    public function __construct(private UserRepository $model) {}
    // Constructor dengan fitur promoted properties PHP 8+
    // Menyimpan instance UserRepository ke dalam properti $model
    public function  getAll()
    {
        $data = $this->model->all(); // Memanggil method all() dari repository untuk mengambil semua data user
        return ['data' => $data]; // Mengembalikan data user dalam bentuk array asosiatif
    }
    public function  create() {}
    // Method ini didefinisikan tapi belum diimplementasikan (kosong)
    // Biasanya digunakan untuk menampilkan form atau data tambahan saat create

    public function store($request)
    {
        $validated  = $request->validated(); // Menjalankan validasi dari Form Request
        $validated = $request->safe()
            ->only(['name', 'age', 'number', 'email', 'address', 'password', 'password_confirmation']);
        // Mengambil data yang aman (whitelist field yang dibutuhkan)
        return $this->model->create($validated); // Kirim data ke repository untuk disimpan ke database
    }

    public function find($id)
    {
        $data = $this->model->find($id); // Cari user berdasarkan ID melalui repository
        return ['data' => $data]; // Kembalikan dalam array
    }

    public function update($request, $id)
    {
        $validated  = $request->validated(); // Validasi input
        $validated = $request->safe()
            ->only(['name', 'age', 'number', 'email', 'address']);
        // Ambil hanya field yang dibolehkan untuk update
        return $this->model->update($validated, $id); // Panggil repository untuk update data
    }
    public function destroy($id)
    {
        $this->model->delete($id); // Hapus data user berdasarkan ID lewat repository
    }
}
