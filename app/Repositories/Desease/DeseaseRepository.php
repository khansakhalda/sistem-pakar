<?php

namespace App\Repositories\Desease;

use App\Models\Desease;
use App\Repositories\Desease\DeseaseInterface;
use Illuminate\Database\Eloquent\Collection;


class DeseaseRepository
{

    public function __construct(private Desease $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return  $this->model->all();
    }
    public function create($data)
    {
        return $this->model->create($data);
    }
    public function find($id): Collection
    {
        return  $this->model->where('kode_penyakit', $id)->get();
    }
    public function update($request, $id)
    {
        $data =  $this->model->find($id);
        $data->nama_penyakit = $request['nama_penyakit'];
        $data->detail_penyakit = $request['detail_penyakit'];
        // $data->solusi_penyakit = $request['solusi_penyakit'];
        return  $data->save();
    }
    public function delete($id): int
    {
        return  $this->model->destroy($id);
    }
}
