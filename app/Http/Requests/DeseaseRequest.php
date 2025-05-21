<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeseaseRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan untuk membuat request ini.
     * Karena ini biasanya dipakai oleh admin yang sudah login, maka return true.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi yang berlaku untuk request ini.
     * Menggunakan switch agar bisa membedakan aturan saat POST (tambah) dan PUT (edit).
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            // Jika method HTTP adalah POST (tambah penyakit baru)
            case 'POST':
                return [
                    'nama_penyakit' => 'required', // Nama penyakit wajib diisi
                    'detail_penyakit' => 'required', // Deskripsi penyakit wajib diisi
                    // 'solusi_penyakit' => 'required',
                ];
                break;
            // Jika method HTTP adalah PUT (edit penyakit)
            case 'PUT':
                return [
                    'nama_penyakit' => 'required',
                    'detail_penyakit' => 'required',
                    // 'solusi_penyakit' => 'required',
                ];
                break;
        }
    }
}
