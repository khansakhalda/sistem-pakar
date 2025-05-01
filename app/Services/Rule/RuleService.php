<?php

namespace App\Services\Rule;

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
use App\Services\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Collection\Collection as CollectionCollection;

class  RuleService implements BaseService
{
    private $term, $skala;

    public function __construct(private RuleRepository $model, private IndicationRepository $gejala, private DeseaseRepository $penyakit)
    {
        $this->term = collect([
            ['nilai' => 1.0, 'deskripsi' => 'Pasti'],
            ['nilai' => 0.8, 'deskripsi' => 'Hampir Pasti'],
            ['nilai' => 0.6, 'deskripsi' => 'Kemungkinan Besar'],
            ['nilai' => 0.4, 'deskripsi' => 'Mungkin'],
            ['nilai' => 0.2, 'deskripsi' => 'Hampir Mungkin'],
            ['nilai' => 0.0, 'deskripsi' => 'Tidak Yakin'],
            // ['nilai' => -0.4, 'deskripsi' => 'Mungkin Tidak'],
            // ['nilai' => -0.6, 'deskripsi' => 'Kemungkinan Besar Tidak'],
            // ['nilai' => -0.8, 'deskripsi' => 'Hampir Pasti Tidak'],
            // ['nilai' => -1.0, 'deskripsi' => 'Pasti Tidak'],
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
        $data = $this->model->all();

        return ['data' => $data];
    }
    public function  create()
    {
        $gejala =  $this->gejala->all();
        $penyakit = $this->penyakit->all();
        $model = $this->model->all();
        $selectedDesease = collect();
        $selectedIndication = collect();
        foreach ($model as $m) {
            $selectedDesease->push($m->kode_penyakit);
            $selectedIndication->push($m->kode_gejala);
        };



        return ['gejala' => $gejala,  'selectedIndication' => $selectedIndication, 'penyakit' => $penyakit, 'selectedDesease' => $selectedDesease, 'term' => $this->term, 'skala' => $this->skala];
    }
    public function store($request)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'cf_pakar', 'mb_pakar', 'md_pakar']);
        $validated['cf_pakar'] = $request['mb_pakar'] - $request['md_pakar'];
        $data = $this->model->create($validated);
        return $data;
    }

    public function find($id)
    {
        $rule = $this->model->find($id)[0];
        $col = collect([]);
        $select = $this->model->where($rule->kode_penyakit);
        $gejala = $this->gejala->all();
        foreach ($select as $g) {
            $col->push($g->kode_gejala);
        }
        return ['data' => $rule, 'gejala' => $gejala, 'selected' => $col, 'term' => $this->term, 'skala' => $this->skala];
    }
    public function getData($id)
    {

        $rule = $this->model->find($id)[0];
        $col = collect([]);
        $select = $this->model->where($id);
        foreach ($select as $g) {
            $col->push($g->kode_gejala);
        }
        $data = $this->model->whereSelected($id, $col);
        return $select;
    }
    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['kode_penyakit', 'kode_gejala', 'mb_pakar', 'md_pakar']);

        // $data = collect([]);
        // if ($validated) {
        //     if ($this->model->delete($id)) {
        //         foreach ($request->kode_gejala as $g) {
        //             $data = [
        //                 'kode_penyakit' => $request->kode_penyakit,
        //                 'kode_gejala' => $g,
        //                 'mb_pakar' => $request->mb_pakar,
        //                 'md_pakar' => $request->md_pakar
        //             ];
        //             $this->model->updateRule($data);
        //         }
        //     }
        // }
        $this->model->update($validated, $id);
        return $validated;
    }
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
