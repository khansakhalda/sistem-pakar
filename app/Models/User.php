<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Untuk membuat factory user (seeding/testing)
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Digunakan untuk mendeklarasikan relasi BelongsTo
use Illuminate\Foundation\Auth\User as Authenticatable; // Inherit fitur autentikasi bawaan Laravel
use Illuminate\Notifications\Notifiable;  // Untuk fitur notifikasi
use Spatie\Permission\Traits\HasRoles; // Trait dari Spatie untuk manajemen role/permission

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Gunakan trait untuk factory, notifikasi, dan peran/izin (Spatie)

    /**
     * Kolom yang dapat diisi secara massal (fillable).
     * Digunakan untuk proteksi Mass Assignment.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name', 
        'age',
        'number',
        'email',
        'address',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat model dikonversi ke array atau JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Password disembunyikan
        'remember_token', // Token sesi login juga disembunyikan
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     * 'email_verified_at' dikonversi ke tipe datetime,
     * 'password' akan otomatis di-hash (jika menggunakan Laravel 10+).
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke model Diagnosis.
     * Relasi ini menyatakan bahwa user "dimiliki oleh" diagnosis.
     * Namun secara logika ini **kurang tepat**.
     * Seharusnya: `hasMany` karena satu user bisa punya banyak diagnosis.
     */
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'kode_pengguna', 'id');
    }
}
