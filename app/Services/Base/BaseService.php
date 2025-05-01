<?php

namespace App\Services\Base;

interface BaseService
{
    public function getAll();
    public function find($id);
    public function destroy($id);
}
