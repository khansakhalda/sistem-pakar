<?php

namespace App\Models;

use App\Helpers\UniqueId; // Trait untuk membuat ID gejala otomatis (seperti G01, G02)
use Illuminate\Database\Eloquent\Factories\HasFactory; // Trait untuk mendukung seeding dan testing
use Illuminate\Database\Eloquent\Model; // Model dasar Laravel
use Illuminate\Database\Eloquent\Relations\BelongsTo; // (Tidak digunakan tapi disiapkan jika ingin relasi)

class Indication extends Model
{
    use HasFactory, UniqueId; // Mengaktifkan factory dan ID generator custom
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false; // ID tidak bertipe integer auto-increment (karena pakai kode seperti G01)
    protected $primaryKey = 'kode_gejala'; // Menentukan bahwa primary key adalah kolom 'kode_gejala'
    protected $fillable = ['nama_gejala']; // Kolom yang boleh diisi secara massal (mass assignable)
}
