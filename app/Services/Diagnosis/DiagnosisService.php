<?php

namespace App\Services\Diagnosis;

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Diagnosis\DiagnosisRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
use App\Services\Base\BaseService;

class  DiagnosisService implements BaseService
{
    private $term;

    public function __construct(private RuleRepository $rule, private IndicationRepository $gejala, private DiagnosisRepository $model)
    {
        // $this->term = collect([
        //     ['nilai' => 1.0, 'deskripsi' => 'Pasti Ya'],
        //     ['nilai' => 0.8, 'deskripsi' => 'Hampir Pasti Ya'],
        //     ['nilai' => 0.6, 'deskripsi' => 'Kemungkinan Besar Ya'],
        //     ['nilai' => 0.4, 'deskripsi' => 'Mungkin Ya'],
        //     ['nilai' => -0.2, 'deskripsi' => 'Tidak Tahu'],
        //     ['nilai' => -0.4, 'deskripsi' => 'Mungkin Tidak'],
        //     ['nilai' => -0.6, 'deskripsi' => 'Kemungkinan Besar Tidak'],
        //     ['nilai' => -0.8, 'deskripsi' => 'Hampir Pasti Tidak'],
        //     ['nilai' => -1.0, 'deskripsi' => 'Pasti Tidak'],
        // ]);
        $this->term = collect([
            ['nilai' => 1.0, 'deskripsi' => 'Sangat Sering / Selalu / Iya '],
            ['nilai' => 0.8, 'deskripsi' => 'Hampir Selalu'],
            ['nilai' => 0.6, 'deskripsi' => 'Sering'],
            ['nilai' => 0.4, 'deskripsi' => 'Kadang-kadang'],
            ['nilai' => 0.2, 'deskripsi' => 'Tidak Tahu'],
            ['nilai' => 0.0, 'deskripsi' => 'Tidak Mengalami'],
        ]);
    }

    public function  getAll()
    {
        $data = $this->model->all();

        return $data;
    }
    public function  create()
    {
        $gejala =  $this->gejala->all();

        return ['gejala' => $gejala, 'term' => $this->term];
    }
    public function store($request)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['nama_pengguna', 'age', 'kode_pengguna', 'alamat_pengguna', 'cf']);
        $kondisi = collect([]);
        foreach ($validated['cf'] as $g) {
            if ($g) {
                $split = explode('*', $g);
                $kondisi->push([
                    "kode_gejala" => $split[0],
                    "nama_gejala" => $split[1],
                    "nilai_cf" => doubleval($split[2]),
                    "deskripsi" => $split[3]
                ]);
            }
        }
        $cf = new CertainlyFactor($this->model, $kondisi);
        $stmt = $cf->proccess();
        if ($stmt['kode_penyakit']) {
            $stmt += ['nama_pengguna' => $validated['nama_pengguna']];
            $stmt += ['age' => $validated['age']];
            $stmt += ['kode_pengguna' => $validated['kode_pengguna']];
            $stmt += ['alamat_pengguna' => $validated['alamat_pengguna']];
            return $this->model->create($stmt);
        } else {
            return false;
        }
    }

    public function find($id)
    {
        $stmt = $this->model->find($id)[0];
        return ['data' => $stmt];
    }

    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'mb_pakar', 'md_pakar']);

        $this->model->update($validated, $id);
        return $validated;
    }
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
    public function deleteAll()
    {
        return $this->model->deleteAll();
    }
}
