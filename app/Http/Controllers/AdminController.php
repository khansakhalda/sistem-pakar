<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest; // Request khusus untuk validasi update profil (tidak digunakan dalam controller ini)
use App\Http\Requests\UserRequest; // Request khusus untuk validasi input admin (tambah/edit)
use App\Services\User\UserService; // Service yang menangani logika bisnis terkait user/admin
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dependency Injection: Laravel otomatis meng-inject UserService ke dalam controller
    public function __construct(private UserService $service)
    {
    }
    /**
     * Menampilkan daftar semua admin/user.
     * Biasanya dipakai untuk halaman utama manajemen admin 
     */
    public function index()
    {
        $data = $this->service->getAll(); // Ambil semua data admin lewat service
        return view('Dashboard.admin.admin', $data); // Tampilkan di view 'admin.blade.php'
    }

    /**
     * Menampilkan form untuk menambahkan admin baru.
     */
    public function create()
    {
        return view('Dashboard.admin.add'); // Tampilkan form tambah admin
    }

    /**
     * Menyimpan data admin baru yang dikirim dari form create.
     * Validasi dilakukan oleh UserRequest.
     */
    public function store(UserRequest $request)
    {
        $this->service->store($request); // Proses penyimpanan lewat service
        return redirect(route('data-admin.index', absolute: false)); // Redirect ke halaman daftar admin
    }

    /**
     * Menampilkan detail satu admin tertentu.
     * (Belum diimplementasikan)
     */
    public function show(string $id)
    {
        // bisa digunakan jika ingin menampilkan detail per admin
    }

    /**
     * Menampilkan form edit untuk admin dengan ID tertentu.
     */
    public function edit(string $id)
    {
        $data = $this->service->find($id); // Ambil data admin berdasarkan ID
        return view('Dashboard.admin.edit', $data); // Tampilkan di form edit
    }

    /**
     * Memproses penyimpanan data hasil edit admin.
     * Validasi dilakukan oleh UserRequest.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->service->update($request, $id); // Update data lewat service
        return redirect(route('data-admin.index'))->with('success', 'Edit Berhasil'); // Redirect dengan notifikasi sukses
    }

    /**
     * Menghapus data admin berdasarkan ID.
     */
    public function destroy(string $id)
    {
        $this->service->destroy($id); // Hapus data lewat service
        return redirect(route('data-admin.index'))->with(['success' => 'Hapus Berhasil']); // Redirect dengan notifikasi
    }
}
