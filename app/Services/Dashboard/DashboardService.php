<?php

namespace App\Services\Dashboard;

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
use App\Services\Base\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Ramsey\Collection\Collection as CollectionCollection;

class  DashboardService
{


    public function __construct(private RuleRepository $rule, private IndicationRepository $gejala, private DeseaseRepository $penyakit)
    {
    }


    public function  getAll()
    {
        $gejala = count($this->gejala->all());
        $penyakit = count($this->penyakit->all());
        $rule = count($this->rule->all());

        return [
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'rule' => $rule,
        ];
    }
}
