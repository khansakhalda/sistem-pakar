<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosisRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan melakukan request ini.
     * Karena diagnosis bisa dilakukan oleh user yang login, maka return true.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi input untuk form diagnosis.
     * Semua field wajib diisi.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cf' => 'required', // Nilai CF (certainty factor) harus ada
            'nama_pengguna' => 'required', // Nama pengguna wajib diisi
            'age' => 'required', // Umur wajib diisi
            'kode_pengguna' => 'required', // ID pengguna (biasanya dari tabel users)
            'alamat_pengguna' => 'required' // Alamat pengguna wajib diisi
        ];
    }
}
