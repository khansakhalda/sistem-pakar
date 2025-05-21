<?php

namespace App\Services\Dashboard;
// Menentukan namespace untuk class ini, berada di folder App/Services/Dashboard
// Berguna untuk pengorganisasian kode dan autoloading via Composer

use App\Repositories\Desease\DeseaseRepository;
use App\Repositories\Indication\IndicationRepository;
use App\Repositories\Rule\RuleRepository;
// Mengimpor repository yang akan digunakan dalam service ini
// Repository bertanggung jawab mengakses data dari database

use App\Services\Base\BaseService; // Mengimpor interface BaseService
use Illuminate\Database\Eloquent\Collection; // Mengimpor class Collection milik Laravel Eloquent untuk tipe data koleksi
use Ramsey\Collection\Collection as CollectionCollection; // Mengimpor class Collection milik Ramsey dan memberi alias 'CollectionCollection'

class  DashboardService // Class service yang digunakan untuk menghitung data statistik pada dashboard admin atau pengguna
{
    public function __construct(private RuleRepository $rule, private IndicationRepository $gejala, private DeseaseRepository $penyakit)
    {
    }

    public function  getAll() // Method untuk mengambil jumlah data dari masing-masing tabel (gejala, penyakit, dan rule)
    {
        $gejala = count($this->gejala->all()); // Mengambil semua data gejala dari repository, lalu menghitung jumlahnya
        $penyakit = count($this->penyakit->all()); // Mengambil semua data penyakit dari repository, lalu menghitung jumlahnya
        $rule = count($this->rule->all()); // Mengambil semua data rule dari repository, lalu menghitung jumlahnya

        return [
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'rule' => $rule,
        ];
        // Mengembalikan array asosiatif yang berisi total masing-masing entitas
    }
}
