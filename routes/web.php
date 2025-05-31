<?php 

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeseaseController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\IndicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

// Halaman umum
Route::get('/', function () {
    return view('User.user-dashboard');
})->middleware('guest')->name('home');

Route::get('/about', function () {
    return view('about.about');
})->name('about');

// Dashboard umum (akan dibatasi per role di view-nya)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/get-data', [RuleController::class, 'getData'])->name('get-data');
Route::get('/cetak-diagnosis/{id}', [DiagnosisController::class, 'cetak'])->name('cetak-diagnosis');

// Hak akses untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('diagnosis-deleteAll', [DiagnosisController::class, 'deleteAll'])->name('diagnosis-deleteAll');
    Route::resource('dashboard/gejala', IndicationController::class);
    Route::resource('dashboard/penyakit', DeseaseController::class);
    Route::resource('dashboard/pengetahuan', RuleController::class);
    Route::resource('dashboard/data-admin', AdminController::class);
});

// Hak akses untuk User dan Admin
Route::middleware(['auth', 'role:user|admin|pakar'])->group(function () {
    Route::resource('diagnosis', DiagnosisController::class);
    Route::get('/riwayat-diagnosis', [DiagnosisController::class, 'history'])->name('riwayat-diagnosis');
});

// Hak akses untuk User, Admin, dan Pakar (untuk profil)
Route::middleware(['auth', 'role:user|admin|pakar'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Hak akses untuk Pakar
Route::middleware(['auth', 'role:pakar'])->group(function () {
    Route::resource('dashboard/gejala', IndicationController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('dashboard/penyakit', DeseaseController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('dashboard/pengetahuan', RuleController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';
