<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class UserRepository
{

    public function __construct(private User $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        $data = $this->model->orderBy('name')->get();
        return  $data;
    }
    public function create($data)
    {
        $stmt = $this->model->create($data);
        $stmt->assignRole('admin');
        return $stmt;
    }
    public function find($id)
    {
        return  $this->model->find($id);
    }
    public function update($request, $id)
    {
        $data =  $this->model->find($id);
        $data->name = $request['name'];
        $data->number = $request['number'];
        $data->age = $request['age'];
        $data->email = $request['email'];
        $data->address = $request['address'];
        return  $data->save();
    }
    public function delete($id): int
    {
        return  $this->model->destroy($id);
    }
}
