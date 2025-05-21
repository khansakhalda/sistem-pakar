<?php

namespace App\Services\Diagnosis; // Menetapkan namespace class ini agar sesuai struktur folder aplikasi Laravel

class CertainlyFactor // Kelas ini bertugas menghitung nilai kepastian (Certainty Factor) dari diagnosa berdasarkan rule dan kondisi gejala input
{
    private $rule, $kondisi;
    // $rule: objek repository rule (aturan penyakit dan gejalanya)
    // $kondisi: koleksi inputan gejala dari user, berisi nilai CF gejala yang dirasakan
    public  function  __construct($rule, $kondisi)
    {
        $this->rule = $rule; // Menyimpan aturan diagnosa
        $this->kondisi = $kondisi; // Menyimpan kondisi/gejala input dari user
    }
    private function getKondisi()
    {
        $arkondisi = collect([]);
        foreach ($this->kondisi as $k) {
            $arkondisi->push($k['kode_gejala']); // Menyimpan kode gejala ke dalam koleksi
        }
        return $arkondisi; // Mengembalikan koleksi kode gejala
    }

    public function proccess()
    {
        $arrayKondisi = $this->getKondisi(); // Ambil kode gejala yang diinput user
        $penyakit = $this->rule->whereIn('kode_gejala', $arrayKondisi); // Ambil rule yang cocok dengan gejala
        $i = 0;
        $cfLama = 0; // Nilai CF sementara
        $cfFinal = collect([]); // Tempat menyimpan hasil akhir
        $namaPenyakit = ""; // Penanda perubahan penyakit saat iterasi
        foreach ($penyakit as $p) {
            if ($namaPenyakit != $p->desease->nama_penyakit) {
                // Jika ganti penyakit, reset nilai awal
                $i = 0;
                $namaPenyakit = $p->desease->nama_penyakit;
                $cfFinal->push($p->desease->kode_penyakit); // Simpan kode
                $cfFinal->push(['s' => $namaPenyakit]); // Simpan nama
                $cfLama = 0;
            }
            // Perhitungan CF Combine: CF = CF Pakar * CF User
            $tempCf = $p['cf_pakar'] * $this->kondisi->where('kode_gejala', $p->indication->kode_gejala)->pluck('nilai_cf')->first();

            if ($cfLama <= 0) {
                $cfLama = $tempCf; // Jika awal, langsung ambil CF pertama
            } else {
                if ($cfLama > 0 && $tempCf > 0) {
                    $cfLama = $cfLama + $tempCf * (1 - $cfLama); // Rumus penggabungan CF jika keduanya positif
                } elseif ($cfLama <= 0 && $tempCf <= 0) {
                    $cfLama = $cfLama + $tempCf * (1 + $cfLama); // Jika keduanya negatif
                } else {
                    $cfLama = ($cfLama + $tempCf) / (1 - min(abs($cfLama), abs($tempCf))); // Jika berbeda tanda
                }
            }
            $cfFinal->push($cfLama * 100); // Simpan nilai CF akhir dalam persen
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
        $max = $this->getMax($r); // Mengambil penyakit dengan nilai CF tertinggi
        // return $cfFinal;
        return [
            'kode_penyakit' => $max[0],
            'nilai_akhir' => $max[1],
            'hasil' => json_encode($r), // Semua hasil penyakit dalam format JSON
            'gejala' => json_encode($this->kondisi) // Gejala yang diinput user
        ];
    }
    public function getMax($r)
    {
        $nama = "";
        $max = 0.0;

        foreach ($r as $m) {
            if ($m['nilai'] > $max) {
                $nama = $m['kode_penyakit']; // Simpan kode penyakit dengan CF tertinggi
                $max = $m['nilai']; // Simpan nilai CF tertinggi
            }
        }
        return [$nama, $max];
    }
}
