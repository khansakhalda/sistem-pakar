<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest; // Base class untuk request validasi Laravel
use Illuminate\Support\Facades\Auth; // Fasilitas login/logout
use Illuminate\Support\Facades\RateLimiter; // Fitur Laravel untuk membatasi percobaan login
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Mengizinkan request ini dieksekusi.
     * Karena login bisa dilakukan oleh siapa pun, maka return true.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi form login.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'], // Email wajib, string, dan format email
            'password' => ['required', 'string'], // Password wajib dan string
        ];
    }

    /**
     * Melakukan proses autentikasi user.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        // Pastikan user belum melewati batas percobaan login
        $this->ensureIsNotRateLimited();

        // Lakukan percobaan login dengan email & password dari form
        if (!Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Jika gagal, hitung percobaan untuk throttle (penguncian akun sementara)
            RateLimiter::hit($this->throttleKey());
            
            // Tampilkan pesan error validasi
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Pesan error dari file localization
            ]);
        }

        // Jika berhasil login, reset jumlah percobaan login
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Mengecek apakah login telah melewati batas percobaan (rate limiting).
     * Maksimal: 5 percobaan (default)
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return; // Masih boleh mencoba login
        }

        // Trigger event Lockout jika percobaan melebihi batas
        event(new Lockout($this));

        // Hitung berapa detik user harus menunggu
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Kirim error validasi ke user
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Mendapatkan key untuk keperluan rate limiting login.
     * Format: "email|ip_address"
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')) . '|' . $this->ip());
    }
}
