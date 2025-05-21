<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicationRequest; // Form request khusus untuk validasi input gejala
use App\Services\Indication\IndicationService; // Service yang berisi logika bisnis gejala
use App\Models\Indication; // Model gejala
use Illuminate\Http\Request;
use PhpParser\Node\Stmt;

class IndicationController extends Controller
{
    // Dependency Injection untuk IndicationService
    public function __construct(private IndicationService $service)
    {
    }
    
    /**
     * Menampilkan daftar semua gejala.
     */
    public function index()
    {
        $data = $this->service->getAll(); // Ambil semua data gejala dari service
        return view('Dashboard.gejala.gejala', ['data' => $data]); // Tampilkan ke view
    }

    /**
     * Menampilkan form tambah gejala
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan data gejala baru.
     */
    public function store(IndicationRequest $request)
    {
        $stmt = $this->service->store($request); // Simpan data melalui service
        if ($stmt) {
            return redirect('dashboard/gejala')->with(['success' => 'Tambah Berhasil']);
        }
    }

    /**
     * Menampilkan detail gejala tertentu
     */
    public function show(Indication $indication)
    {
        //
    }

    /**
     * Menampilkan form edit gejala berdasarkan ID.
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        return view('Dashboard.gejala.edit',  ['data' => $data[0]]);
    }

    /**
     * Menyimpan perubahan data gejala berdasarkan ID.
     */
    public function update(IndicationRequest $request, $id)
    {
        $stmt = $this->service->update($request, $id);
        if ($stmt) {
            return redirect('dashboard/gejala')->with(['success' => 'Edit Berhasil']);
        }
    }

    /**
     * Menghapus gejala berdasarkan ID.
     */
    public function destroy($id)
    {
        $this->service->destroy($id); // Hapus lewat service
        return redirect('dashboard/gejala')->with(['success' => 'Hapus Berhasil']);
    }
}
