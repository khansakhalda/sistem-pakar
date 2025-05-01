<?php

namespace App\Repositories\Diagnosis;

use App\Repositories\Base\baseRepository;

interface DiagnosisInterface extends BaseRepository
{
    public function where($key);
}
