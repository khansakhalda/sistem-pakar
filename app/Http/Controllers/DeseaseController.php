<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeseaseRequest; // Import request khusus yang berisi validasi data penyakit
use App\Models\Desease; // Model penyakit
use App\Services\Desease\DeseaseService; // Service yang menangani logika bisnis penyakit
use Illuminate\Http\Request;

class DeseaseController extends Controller
{
    // Dependency injection: service akan otomatis tersedia untuk semua method controller ini
    public function __construct(private DeseaseService $service)
    {
    }
    /**
     * Menampilkan daftar semua penyakit
     */
    public function index()
    {
        $data = $this->service->getAll(); // Ambil semua data penyakit dari service
        return view('Dashboard.penyakit.penyakit', ['data' => $data]); // Tampilkan di view
    }

    /**
     * Menampilkan form tambah penyakit
     */
    public function create()
    {
        return view('Dashboard.penyakit.add'); // Arahkan ke halaman form tambah
    }

    /**
     * Menyimpan data penyakit baru
     */
    public function store(DeseaseRequest $request)
    {
        $stmt = $this->service->store($request); // Simpan data lewat service
        if ($stmt) {
            // Jika berhasil, arahkan ke halaman daftar penyakit
            return redirect('dashboard/penyakit')->with(['success' => 'Tambah Berhasil']);
        } else {
            // Jika gagal, debug input yang dikirim
            dd($request);
        }
    }

    /**
     * Menampilkan detail penyakit tertentu (belum digunakan)
     */
    public function show(Desease $desease)
    {
        // Kosong
    }

    /**
     * Menampilkan form edit penyakit
     */
    public function edit($id)
    {
        $data = $this->service->find($id); // Cari data berdasarkan ID
        return view('Dashboard.penyakit.edit',  ['data' => $data[0]]); // Kirim data ke form edit
    }

    /**
     * Memperbarui data penyakit berdasarkan ID
     */
    public function update(DeseaseRequest $request, $id)
    {
        $stmt = $this->service->update($request, $id); // Update data lewat service
        if ($stmt) {
            return redirect('dashboard/penyakit')->with(['success' => 'Edit Berhasil']);
        }
    }

    /**
     * Menghapus data penyakit berdasarkan ID
     */
    public function destroy($id)
    {
        $this->service->destroy($id); // Hapus data lewat service
        return redirect('dashboard/penyakit')->with(['success' => 'Hapus Berhasil']);
    }
}
