<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $service)
    {
    }
    /**
     * Menampilkan daftar sumber daya.
     */
    public function index()
    {
        $data = $this->service->getAll();
        return view('Dashboard.dashboard', $data);
    }

    /**
     * Menampilkan formulir untuk membuat sumber daya baru.
     */
    public function create()
    {
        //
    }

    /**
     * Simpan sumber daya yang baru dibuat dalam penyimpanan.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan sumber daya yang ditentukan.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan formulir untuk mengedit sumber daya yang ditentukan.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Perbarui sumber daya yang ditentukan dalam penyimpanan.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Hapus sumber daya yang ditentukan dari penyimpanan.
     */
    public function destroy(string $id)
    {
        //
    }
}
