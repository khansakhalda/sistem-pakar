<?php

namespace App\Services\Desease;

use App\Repositories\Desease\DeseaseRepository;
use App\Services\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;

class DeseaseService implements BaseService
{

    public function __construct(private DeseaseRepository $model)
    {
    }

    public function  getAll(): Collection
    {
        return $this->model->all();
    }
    public function store($request)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['nama_penyakit', 'detail_penyakit']);

        return $this->model->create($validated);
    }

    public function find($id): Collection
    {
        return $this->model->find($id);
    }
    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['nama_penyakit', 'detail_penyakit']);
        return $this->model->update($validated, $id);
    }
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
