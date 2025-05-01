<?php

namespace App\Repositories\Rule;

use App\Repositories\Base\baseRepository;

interface RuleInterface extends BaseRepository
{
    public function where($key);
}
