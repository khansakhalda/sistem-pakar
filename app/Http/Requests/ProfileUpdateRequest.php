<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Aturan validasi untuk form update profil.
     * Semua field diwajibkan, dan beberapa harus unik (kecuali milik user itu sendiri).
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'], // Wajib diisi, Harus berupa teks, Maksimal 255 karakter
            'age' => ['required', 'integer'], // Wajib diisi, Harus angka bulat
            'number' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', Rule::unique(User::class)->ignore($this->user()->id)], // Nomor HP wajib, Berupa teks (karena bisa ada angka 0 di depan), Minimal 10 digit, Maksimal 15 digit, Harus angka saja, Harus unik di tabel user, Tapi abaikan milik user yang sedang login 
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)], // Harus huruf kecil (untuk konsistensi), Format harus valid email, Email juga harus unik, kecuali milik sendiri
        ];
    }
}
