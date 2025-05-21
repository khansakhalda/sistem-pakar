<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider; // Provider dasar Laravel
use Illuminate\Support\Facades\Gate; // Digunakan untuk otorisasi (akses)

class AppServiceProvider extends ServiceProvider
{
    /**
     * Method untuk mendaftarkan service tambahan (jika ada).
     * Biasanya dipakai untuk bind interface ke implementasi.
     */
    public function register(): void
    {
    }

    /**
     * Method ini dijalankan saat aplikasi bootstraping.
     * Cocok untuk logika awal seperti konfigurasi akses, gate, observer, dll.
     */
    public function boot(): void
    {
        /**
         * Gate::before digunakan untuk mendefinisikan pengecualian umum terhadap gate Laravel.
         * Dalam hal ini, jika user memiliki role 'super_admin', maka:
         * → semua izin akan diberikan secara otomatis,
         * → tanpa perlu mendefinisikan setiap permission satu per satu.
         * 
         * Fungsi ini akan dijalankan sebelum gate lainnya diproses.
         * 
         * Contoh penggunaan:
         * @can('edit user') akan selalu true jika user adalah 'super_admin'
         */
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        // Jika user adalah super_admin → selalu diizinkan
        // Jika bukan → lanjutkan ke gate normal (null artinya tidak override)
        });
    }
}
