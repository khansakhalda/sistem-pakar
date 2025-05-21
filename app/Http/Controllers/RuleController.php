<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleRequest; // Request khusus untuk validasi form aturan (rule)
use App\Models\Indication; // Model untuk gejala
use App\Models\Rule; // Model untuk aturan penyakit-gejala
use App\Services\Rule\RuleService; // Service berisi logika bisnis rule
use Illuminate\Http\Request;

class RuleController extends Controller
{
    // Injeksi RuleService ke dalam controller
    public function __construct(private RuleService $service)
    {
    }

    /**
     * Menampilkan daftar semua data aturan (rules).
     */
    public function index()
    {
        $data = $this->service->getAll(); // Ambil seluruh data rule dari service
        return view(
            'Dashboard.pengetahuan.pengetahuan', $data); // Kirim data ke view
        
        // Baris berikut tidak akan dieksekusi karena berada setelah return
        dd($data);
    }

    /**
     * Menampilkan form untuk menambahkan aturan baru.
     */
    public function create()
    {
        $data = $this->service->create(); // Ambil data yang dibutuhkan seperti daftar penyakit & gejala
        return view('Dashboard.pengetahuan.add',  $data); // Tampilkan form tambah
    }

    /**
     * Menyimpan aturan baru ke database.
     */
    public function store(RuleRequest $request)
    {
        $stmt = $this->service->store($request); // Simpan data dari request ke database via service
        if ($stmt) {
            return redirect('dashboard/pengetahuan')->with(['success' => 'Tambah Berhasil']);
        } else {
            dd($request); // Debug data jika gagal
        }
    }

    /**
     * Menampilkan detail aturan tertentu (belum digunakan).
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit aturan berdasarkan ID.
     */
    public function edit($id)
    {
        $data = $this->service->find($id); // Cari data rule berdasarkan ID
        return view('Dashboard.pengetahuan.edit',  $data); // Tampilkan form edit
    }

    /**
     * Menyimpan perubahan dari form edit aturan.
     */
    public function update(RuleRequest $request, $id)
    {
        $data = $this->service->update($request, $id); // Update rule berdasarkan ID
        return redirect('dashboard/pengetahuan')->with(['success' => 'Edit Berhasil']);
    }

    /**
     * Mendapatkan data gejala yang belum dipakai oleh penyakit tertentu.
     * Digunakan saat form memilih gejala untuk aturan baru (via AJAX).
     */
    public function getData(Request $request)
    {
        $selectedValue = $request->input('selectedValue'); // Ambil kode penyakit dari permintaan AJAX
        // Mengambil data sesuai dengan nilai yang diterima
        $selected =  ['G01'];
        $col = collect([]); // Inisialisasi koleksi kode gejala
        $select = Rule::where('kode_penyakit', $selectedValue)->get(); // Ambil aturan berdasarkan penyakit
        
        // Masukkan semua kode gejala yang sudah dipakai ke koleksi
        foreach ($select as $g) {
            $col->push($g->kode_gejala);
        }

        // Ambil gejala yang belum dipakai (not in)
        $data = Indication::whereNotIn('kode_gejala', $col)->get();

        return response()->json($data); // Kirim balik dalam format JSON
    }


    /**
     * Menghapus aturan berdasarkan ID.
     */
    public function destroy($id)
    {
        $this->service->destroy($id); // Hapus data dari database lewat service
        return redirect('dashboard/pengetahuan')->with(['success' => 'Hapus Berhasil']);
    }
}
