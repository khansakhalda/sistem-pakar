<?php

namespace App\Services\Diagnosis;

class CertainlyFactor
{
    private $rule, $kondisi;

    public  function  __construct($rule, $kondisi)
    {
        $this->rule = $rule;
        $this->kondisi = $kondisi;
    }
    private function getKondisi()
    {
        $arkondisi = collect([]);
        foreach ($this->kondisi as $k) {
            $arkondisi->push($k['kode_gejala']);
        }
        return $arkondisi;
    }

    public function proccess()
    {
        $arrayKondisi = $this->getKondisi();
        $penyakit = $this->rule->whereIn('kode_gejala', $arrayKondisi);
        $i = 0;
        $cfLama = 0;
        $cfFinal = collect([]);
        $namaPenyakit = "";
        foreach ($penyakit as $p) {
            if ($namaPenyakit != $p->desease->nama_penyakit) {
                $i = 0;
                $namaPenyakit = $p->desease->nama_penyakit;
                $cfFinal->push($p->desease->kode_penyakit);
                $cfFinal->push(['s' => $namaPenyakit]);
                $cfLama = 0;
            }
            //CF Combine 
            $tempCf = $p['cf_pakar'] * $this->kondisi->where('kode_gejala', $p->indication->kode_gejala)->pluck('nilai_cf')->first();

            if ($cfLama <= 0) {
                $cfLama = $tempCf;
            } else {
                if ($cfLama > 0 && $tempCf > 0) {
                    $cfLama = $cfLama + $tempCf * (1 - $cfLama);
                } elseif ($cfLama <= 0 && $tempCf <= 0) {
                    $cfLama = $cfLama + $tempCf * (1 + $cfLama);
                } else {
                    $cfLama = ($cfLama + $tempCf) / (1 - min(abs($cfLama), abs($tempCf)));
                }
            }
            $cfFinal->push($cfLama * 100);
            $i++;
        }
        $r = [];
        $index = -1; // Inisialisasi indeks
        foreach ($cfFinal as $item) {
            if (is_string($item)) {
                $index++;
                $r[$index]['kode_penyakit'] = $item; // Simpan 'kode_penyakit'
            } elseif (is_array($item)) {
                $r[$index]['nama_penyakit'] = $item['s']; // Simpan 'nama_penyakit'
            } else {
                $r[$index]['nilai'] = doubleval($item); // Simpan 'nilai'
            }
        }
        $max = $this->getMax($r);
        // return $cfFinal;
        return [
            'kode_penyakit' => $max[0],
            'nilai_akhir' => $max[1],
            'hasil' => json_encode($r),
            'gejala' => json_encode($this->kondisi)
        ];
    }
    public function getMax($r)
    {
        $nama = "";
        $max = 0.0;

        foreach ($r as $m) {
            if ($m['nilai'] > $max) {
                $nama = $m['kode_penyakit'];
                $max = $m['nilai'];
            }
        }
        return [$nama, $max];
    }
}
