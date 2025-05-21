<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicationRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna diizinkan untuk menjalankan request ini.
     * Di sini selalu mengembalikan true, artinya semua pengguna yang login diizinkan.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Menentukan aturan validasi yang akan diterapkan pada input.
     * Menggunakan switch-case untuk membedakan aturan antara POST dan PUT,
     * meskipun pada kasus ini keduanya menggunakan aturan yang sama.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST': // Saat membuat gejala baru
                return [
                    'nama_gejala' => 'required', // Field nama_gejala wajib diisi
                ];
                break;
            case 'PUT': // Saat mengedit data gejala
                return [
                    'nama_gejala' => 'required', // Field nama_gejala juga wajib diisi
                ];
                break;
        }
    }
}
