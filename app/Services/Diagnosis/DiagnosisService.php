<?php

namespace App\Services\Diagnosis; // Menentukan namespace class ini berada di folder App\Services\Diagnosis

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Diagnosis\DiagnosisRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
use App\Services\Base\BaseService;
// Menentukan namespace class ini berada di folder App\Services\Diagnosis

class  DiagnosisService implements BaseService // Class DiagnosisService adalah service untuk menangani diagnosis dan mengimplementasikan BaseService
{
    private $term; // Menyimpan daftar nilai CF dan deskripsinya yang digunakan untuk input user

    public function __construct(private RuleRepository $rule, private IndicationRepository $gejala, private DiagnosisRepository $model) // Constructor: menerima repository rule, gejala, dan diagnosis sebagai dependency injection
    {
        // Inisialisasi nilai CF dan term linguistik untuk input pengguna
        $this->term = collect([
            ['nilai' => 1.0, 'deskripsi' => 'Selalu / Sangat Sering'],
            ['nilai' => 0.8, 'deskripsi' => 'Hampir Selalu'],
            ['nilai' => 0.6, 'deskripsi' => 'Sering'],
            ['nilai' => 0.4, 'deskripsi' => 'Kadang-kadang'],
            ['nilai' => 0.2, 'deskripsi' => 'Tidak Yakin / Tidak Tahu'],
            ['nilai' => 0.0, 'deskripsi' => 'Tidak Pernah Mengalami'],
        ]);
    }

    public function  getAll()
    {
        $data = $this->model->all(); // Mengambil semua data diagnosis dari repository
        return $data;
    }
    public function  create()
    {
        $gejala =  $this->gejala->all(); // Ambil semua gejala dari repository
        return ['gejala' => $gejala, 'term' => $this->term]; // Kembalikan data gejala dan skala nilai input
    }
    public function store($request)
    {
        $validated  = $request->validated(); // Validasi input form
        $validated = $request->safe()
            ->only(['nama_pengguna', 'age', 'kode_pengguna', 'alamat_pengguna', 'cf']);
        // Mengambil data yang aman dari form request

        $kondisi = collect([]);
        foreach ($validated['cf'] as $g) {
            if ($g) {
                $split = explode('*', $g); // Format input: kode_gejala*nama_gejala*nilai_cf*deskripsi
                $kondisi->push([
                    "kode_gejala" => $split[0],
                    "nama_gejala" => $split[1],
                    "nilai_cf" => doubleval($split[2]),
                    "deskripsi" => $split[3]
                ]);
            }
        }
        $cf = new CertainlyFactor($this->model, $kondisi); // Inisialisasi class perhitungan CF
        $stmt = $cf->proccess(); // Proses perhitungan CF
        if ($stmt['kode_penyakit']) {
            // Jika diagnosis berhasil, tambahkan data pengguna
            $stmt += ['nama_pengguna' => $validated['nama_pengguna']];
            $stmt += ['age' => $validated['age']];
            $stmt += ['kode_pengguna' => $validated['kode_pengguna']];
            $stmt += ['alamat_pengguna' => $validated['alamat_pengguna']];
            return $this->model->create($stmt); // Simpan hasil ke database
        } else {
            return false; // Jika tidak ada hasil diagnosa
        }
    }

    public function find($id)
    {
        $stmt = $this->model->find($id)[0]; // Ambil data diagnosis berdasarkan ID (mengambil elemen pertama dari collection)
        return ['data' => $stmt];
    }

    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'mb_pakar', 'md_pakar']);

        $this->model->update($validated, $id); // Update data diagnosis berdasarkan ID
        return $validated; // Kembalikan data yang diupdate
    }
    public function destroy($id)
    {
        return $this->model->delete($id); // Hapus satu data diagnosis berdasarkan ID
    }
    public function deleteAll()
    {
        return $this->model->deleteAll(); // Hapus semua data diagnosis
    }
}
