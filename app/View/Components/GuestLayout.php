<?php

namespace App\View\Components;
// Menentukan namespace class ini agar sesuai struktur Laravel: App/View/Components
// Namespace ini penting untuk autoload dan penggunaan tag Blade seperti <x-guest-layout>

use Illuminate\View\Component;
// Mengimpor base class Component dari Laravel.
// Semua Blade Component harus meng-extend class ini.

use Illuminate\View\View;
// Mengimpor class View yang digunakan sebagai tipe pengembalian (return type) pada method render().

class GuestLayout extends Component
// Mendefinisikan komponen Blade bernama GuestLayout
// Biasanya digunakan untuk membungkus tampilan yang tidak memerlukan autentikasi (login, register, forgot password, dsb.)
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest');
        // Mengembalikan view Blade bernama layouts/guest.blade.php
        // Artinya, saat <x-guest-layout> dipanggil di Blade file, layout ini akan digunakan
    }
}
