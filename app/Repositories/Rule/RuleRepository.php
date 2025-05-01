<?php

namespace App\Repositories\Rule;

use App\Models\Rule;
use App\Repositories\Rule\RuleInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RuleRepository
{

    public function __construct(private Rule $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        // $data = Rule::select(
        //     'deseases.kode_penyakit',
        //     'deseases.nama_penyakit',
        //     DB::raw('GROUP_CONCAT(indications.nama_gejala) AS gejala_array'),
        //     DB::raw('AVG(rules.mb_pakar) AS mb_pakar'),
        //     DB::raw('AVG(rules.md_pakar) AS md_pakar')
        // )
        //     ->join('deseases', 'rules.kode_penyakit', '=', 'deseases.kode_penyakit')
        //     ->join('indications', 'rules.kode_gejala', '=', 'indications.kode_gejala')
        //     ->groupBy('deseases.kode_penyakit', 'deseases.nama_penyakit')
        //     ->get();

        // foreach ($data as $item) {
        //     $item->gejala_array = explode(',', $item->gejala_array);
        // }
        $data = $this->model->orderBy('kode_penyakit')->get();
        // $data = $this->model->join('deseases', 'rules.kode_penyakit', '=', 'deseases.kode_penyakit')
        //     ->select('rules.*', 'deseases.nama_penyakit')
        //     ->groupBy('rules.kode_pengetahuan', 'deseases.nama_penyakit')
        //     ->get()
        //     ->groupBy('nama_penyakit');


        return $data;
    }
    public function create($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return  $this->model->where('kode_pengetahuan', $id)->get();
    }

    public function where($filter): Collection
    {
        return  $this->model->where('kode_penyakit', $filter)->get();
    }


    public function whereSelected($id, $selected): Collection
    {
        return $this->model->where('kode_penyakit', $id)->whereNotIn('id', $selected)->get();
    }



    public function whereIn($id, $filter)
    {
        return  $this->model->whereIn($id, $filter)->orderBy('kode_penyakit')->get();
    }

    public function update($request, $id)
    {
        $data = $this->model->find($id);
        $data->kode_penyakit = $request['kode_penyakit'];
        $data->kode_gejala = $request['kode_gejala'];
        $data->cf_pakar = $request['mb_pakar'] - $request['md_pakar'];
        $data->mb_pakar = $request['mb_pakar'];
        $data->md_pakar = $request['md_pakar'];
        return $data->save();
    }
    public function updateRule($data)
    {
        // $data =  $this->model->find($id);
        // $data->nama_gejala = $request['nama_gejala'];
        // return  $data->save();
        return $this->model->create($data);
    }
    public function delete($id): int
    {
        return  $this->model->destroy($id);
    }
}
