<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\Base\BaseService;


class  UserService implements BaseService
{

    public function __construct(private UserRepository $model) {}

    public function  getAll()
    {
        $data = $this->model->all();

        return ['data' => $data];
    }
    public function  create() {}
    public function store($request)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['name', 'age', 'number', 'email', 'address', 'password', 'password_confirmation']);

        return $this->model->create($validated);
    }

    public function find($id)
    {
        $data = $this->model->find($id);
        return ['data' => $data];
    }

    public function update($request, $id)
    {
        $validated  = $request->validated();
        $validated = $request->safe()
            ->only(['name', 'age', 'number', 'email', 'address']);

        return $this->model->update($validated, $id);
    }
    public function destroy($id)
    {
        $this->model->delete($id);
    }
}
