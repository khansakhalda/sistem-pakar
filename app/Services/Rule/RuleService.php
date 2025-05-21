<?php

namespace App\Services\Rule; // Menyatakan namespace class agar sesuai dengan struktur folder Laravel

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
use App\Services\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Collection\Collection as CollectionCollection;
// Mengimpor repository dan class yang digunakan. Catatan: CollectionCollection dari Ramsey tidak digunakan, bisa dihapus.

class  RuleService implements BaseService
// Class service ini mengimplementasikan BaseService dan menangani logika rule (aturan penyakit-gejala)
{
    private $term, $skala; // Properti untuk menyimpan daftar nilai kepercayaan (CF) dalam bentuk koleksi

    public function __construct(private RuleRepository $model, private IndicationRepository $gejala, private DeseaseRepository $penyakit)
    {
        // Inisialisasi daftar nilai CF (term) dan skala keyakinan
        $this->term = collect([
            ['nilai' => 1.0, 'deskripsi' => 'Pasti'],
            ['nilai' => 0.8, 'deskripsi' => 'Hampir Pasti'],
            ['nilai' => 0.6, 'deskripsi' => 'Kemungkinan Besar'],
            ['nilai' => 0.4, 'deskripsi' => 'Mungkin'],
            ['nilai' => 0.2, 'deskripsi' => 'Hampir Mungkin'],
            ['nilai' => 0.0, 'deskripsi' => 'Tidak Yakin'],
        ]);
        $this->skala = collect([
            ['nilai' => 1.0, 'deskripsi' => 'Pasti'],
            ['nilai' => 0.9, 'deskripsi' => 'Hampir Pasti'],
            ['nilai' => 0.8, 'deskripsi' => 'Kemungkinan Besar'],
            ['nilai' => 0.7, 'deskripsi' => 'Mungkin'],
            ['nilai' => 0.6, 'deskripsi' => 'Hampir Mungkin'],
            ['nilai' => 0.5, 'deskripsi' => 'Tidak Yakin'],
            ['nilai' => 0.4, 'deskripsi' => 'Mungkin Tidak'],
            ['nilai' => 0.3, 'deskripsi' => 'Kemungkinan Besar Tidak'],
            ['nilai' => 0.2, 'deskripsi' => 'Hampir Pasti Tidak'],
            ['nilai' => 0.1, 'deskripsi' => 'Pasti Tidak'],
            ['nilai' => 0.0, 'deskripsi' => 'Pasti Tidak'],
        ]);
    }

    public function  getAll()
    {
        $data = $this->model->all(); // Ambil semua rule dari repository

        return ['data' => $data]; // Kembalikan dalam format array
    }
    public function  create()
    {
        $gejala =  $this->gejala->all(); // Ambil semua gejala
        $penyakit = $this->penyakit->all(); // Ambil semua penyakit
        $model = $this->model->all(); // Ambil semua rule
        $selectedDesease = collect(); // Koleksi kode penyakit yang sudah digunakan
        $selectedIndication = collect(); // Koleksi kode gejala yang sudah digunakan
        foreach ($model as $m) {
            $selectedDesease->push($m->kode_penyakit);
            $selectedIndication->push($m->kode_gejala);
        };


        // Kembalikan semua data yang dibutuhkan untuk form tambah rule
        return ['gejala' => $gejala,  'selectedIndication' => $selectedIndication, 'penyakit' => $penyakit, 'selectedDesease' => $selectedDesease, 'term' => $this->term, 'skala' => $this->skala];
    }
    public function store($request)
    {
        $validated  = $request->validated(); // Validasi input form
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'cf_pakar', 'mb_pakar', 'md_pakar']);
        $validated['cf_pakar'] = $request['mb_pakar'] - $request['md_pakar']; // Hitung nilai CF pakar dari MB - MD
        $data = $this->model->create($validated); // Simpan ke database lewat repository
        return $data;
    }

    public function find($id)
    {
        $rule = $this->model->find($id)[0]; // Ambil data rule berdasarkan ID (ambil elemen pertama)
        $col = collect([]);
        $select = $this->model->where($rule->kode_penyakit); // Ambil semua rule berdasarkan kode penyakit
        $gejala = $this->gejala->all();
        foreach ($select as $g) {
            $col->push($g->kode_gejala); // Kumpulkan semua kode gejala terkait
        }
        return ['data' => $rule, 'gejala' => $gejala, 'selected' => $col, 'term' => $this->term, 'skala' => $this->skala];
    }
    public function getData($id)
    {

        $rule = $this->model->find($id)[0];
        $col = collect([]);
        $select = $this->model->where($id); // Ambil rule berdasarkan kode penyakit
        foreach ($select as $g) {
            $col->push($g->kode_gejala);
        }
        $data = $this->model->whereSelected($id, $col);
        return $select; // Hanya mengembalikan $select meskipun $data dihitung (tidak digunakan)
    }
    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'mb_pakar', 'md_pakar']);

        // Update rule lewat repository
        $this->model->update($validated, $id);
        return $validated;
    }
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
