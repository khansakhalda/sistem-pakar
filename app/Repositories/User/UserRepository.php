<?php

namespace App\Repositories\User; // Menetapkan namespace untuk file ini agar sesuai dengan struktur folder proyek dan PSR-4 autoloading

use App\Models\User; // Mengimpor model Eloquent 'User' yang mewakili tabel users di database
use App\Repositories\User\UserInterface; // Mengimpor interface UserInterface yang seharusnya digunakan untuk kontrak repository
use Illuminate\Database\Eloquent\Collection; // Mengimpor class Collection dari Laravel untuk tipe data koleksi hasil query
use Spatie\Permission\Models\Role; // Mengimpor class Role dari package Spatie Permission untuk pengelolaan peran (role) pengguna

class UserRepository // Mendefinisikan class UserRepository yang bertugas mengelola data pengguna
{

    public function __construct(private User $model) // Constructor yang menggunakan promoted property PHP 8 untuk menyimpan instance model User
    {
        $this->model = $model;
    }

    public function all(): Collection // Method untuk mengambil semua data pengguna dari database
    {
        $data = $this->model->orderBy('name')->get(); // Mengambil semua user dari tabel, diurutkan berdasarkan kolom 'name'
        return  $data; // Mengembalikan hasil query sebagai koleksi Eloquent
    }
    public function create($data) // Method untuk menambahkan user baru ke database
    {
        $stmt = $this->model->create($data); // Membuat user baru menggunakan method create() dari Eloquent
        $stmt->assignRole('admin'); // Memberikan peran 'admin' kepada user baru menggunakan fitur dari package Spatie
        return $stmt; // Mengembalikan data user yang baru dibuat
    }
    public function find($id) // Method untuk mencari satu user berdasarkan ID-nya
    {
        return  $this->model->find($id); // Menggunakan method find() Eloquent untuk mengambil user berdasarkan primary key
    }
    public function update($request, $id) // Method untuk memperbarui data user berdasarkan ID
    {
        $data =  $this->model->find($id);  // Mencari user berdasarkan ID
        $data->name = $request['name'];  // Memperbarui kolom name
        $data->number = $request['number']; // Memperbarui kolom number
        $data->age = $request['age']; // Memperbarui kolom age
        $data->email = $request['email']; // Memperbarui kolom email
        $data->address = $request['address']; // Memperbarui kolom address
        return  $data->save(); // Menyimpan perubahan ke database dan mengembalikan nilai boolean
    }
    public function delete($id): int // Method untuk menghapus user berdasarkan ID
    {
        return  $this->model->destroy($id);
        // Menggunakan method destroy() dari Eloquent untuk menghapus data dan mengembalikan jumlah data yang terhapus
    }
}
