<?php

namespace App\View\Components;
// Menetapkan namespace agar class ini berada dalam struktur App\View\Components
// Namespace ini penting agar class bisa digunakan di seluruh Laravel project dengan autoload

use Illuminate\View\Component;
use Illuminate\View\View;
// Mengimpor:
// - Component: class dasar untuk semua Blade component
// - View: class representasi tampilan (hasil yang dirender)

class AppLayout extends Component
// Mendefinisikan class komponen bernama AppLayout yang merupakan turunan dari Component
// Komponen ini akan digunakan untuk membungkus layout tampilan aplikasi (template utama)
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
        // Mengembalikan view Blade yang akan digunakan sebagai layout (layouts/app.blade.php)
        // View ini akan digunakan saat <x-app-layout> dipanggil di Blade file
    }
}
