<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest; // Form request khusus untuk validasi saat update profil
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk autentikasi user (login/logout)
use Illuminate\Support\Facades\Redirect; // Untuk redirect ke route tertentu
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman form profil pengguna yang sedang login.
     */
    public function edit(Request $request): View
    {
        return view('Dashboard.profile.profile', [
            'user' => $request->user(), // Kirim data user yang sedang login ke view
        ]);
    }

    /**
     * Menyimpan perubahan informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi data user dengan data yang sudah divalidasi
        $request->user()->fill($request->validated());

        // Jika email diubah, reset verifikasi email (wajib verifikasi ulang)
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save(); // Simpan perubahan

        return Redirect::route('profile.edit')->with('success', 'Profile Diperbaharui');
    }

    /**
     * Menghapus akun pengguna yang sedang login.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password untuk memastikan user benar-benar ingin hapus akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'], // Menggunakan rule Laravel 'current_password'
        ]);

        $user = $request->user(); // Ambil user aktif
        Auth::logout(); // Logout user

        $user->delete(); // Hapus akun dari database

        // Reset session setelah penghapusan akun
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/'); // Kembali ke halaman utama
    }
}
