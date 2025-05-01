<?php

namespace App\Repositories\Base;

interface BaseRepository
{

    public function  all();
    public function  create($request);
    public function  find($id);
    public function  update($request, $id);
    public function  delete($id);
}
