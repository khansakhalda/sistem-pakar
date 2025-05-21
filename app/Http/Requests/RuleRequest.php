<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuleRequest extends FormRequest
{
    /**
     * Aturan validasi yang akan diterapkan pada request input form rule.
     * Dipakai saat menambah atau mengedit aturan penyakit ↔ gejala.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode_penyakit' => ['required', 'string', 'max:255'], // Harus diisi, Harus berupa teks, Maksimal panjang 255 karakter
            'kode_gejala' => ['required'], // Harus ada kode gejala yang dipilih, Bisa ditambahkan validasi array atau exists jika data banyak
            'mb_pakar' => ['required'], // Nilai MB (Measure of Belief) dari pakar wajib diisi, Bisa ditambahkan: 'numeric', 'between:0,1' untuk validasi lebih ketat
            'md_pakar' => ['required'], // Nilai MD (Measure of Disbelief) dari pakar juga wajib, Bisa juga ditambahkan: 'numeric', 'between:0,1'
        ];
    }
}
