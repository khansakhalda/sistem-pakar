<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Menentukan apakah user boleh menjalankan request ini.
     * Karena form ini dipakai oleh admin atau sistem, maka diizinkan (true).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi berdasarkan metode HTTP (POST untuk tambah, PUT untuk edit).
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        switch ($this->method()) {
            // Aturan validasi saat menambah user baru
            case 'POST':
                return [
                    'name' => ['required', 'string', 'max:255'], // Nama wajib, teks, max 255 karakter
                    'age' => ['required', 'integer'], // Umur wajib, bilangan bulat
                    'number' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', Rule::unique(User::class)], // Nomor hanya angka, Nomor harus unik di tabel users
                    'address' => ['required', 'string', 'max:255'],  // Alamat wajib, teks
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class], // Email harus unik
                    'password' => ['required', 'confirmed', Rules\Password::defaults()], // Password wajib & dikonfirmasi
                ];
                break;
            // Aturan validasi saat mengedit data user
            case 'PUT':
                return [
                    'name' => ['required', 'string', 'max:255'],
                    'age' => ['required', 'integer'],
                    'number' => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', Rule::unique(User::class)->ignore($this->input('id'))], // Nomor unik, kecuali milik user ini
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                    // Tidak di-set unique di sini, bisa ditambahkan jika perlu pengecekan unik
                ];
                // Tidak ada validasi password di PUT karena biasanya tidak diubah di sini
                break;
        }
    }
}
