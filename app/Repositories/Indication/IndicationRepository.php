<?php

namespace App\Repositories\Indication;

use App\Models\Indication;
use App\Repositories\Indication\indicationInterface;
use Illuminate\Database\Eloquent\Collection;


class IndicationRepository
{

    public function __construct(private Indication $model)
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
        return  $this->model->where('kode_gejala', $id)->get();
    }
    public function update($request, $id)
    {
        $data =  $this->model->find($id);
        $data->nama_gejala = $request['nama_gejala'];
        return  $data->save();
    }
    public function delete($id): int
    {
        return  $this->model->destroy($id);
    }
}
