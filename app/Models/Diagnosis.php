<?php

namespace App\Models;

use App\Helpers\UniqueId; // Trait untuk membuat ID diagnosis otomatis
use Illuminate\Database\Eloquent\Factories\HasFactory; // Trait untuk seeder/testing
use Illuminate\Database\Eloquent\Model; // Model dasar Laravel
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Diagnosis extends Model
{
    use HasFactory, UniqueId; // Trait untuk factory dan ID otomatis
    public $incrementing = false; // Menonaktifkan auto-increment karena ID diagnosis berbentuk string
    protected $primaryKey = 'diagnosis_id'; // Menentukan primary key yang digunakan

    // Kolom-kolom yang diizinkan untuk mass assignment (boleh diisi langsung)
    protected $fillable = ['kode_penyakit', 'age', 'nama_pengguna', 'kode_pengguna', 'alamat_pengguna', 'nilai_akhir', 'hasil', 'gejala'];
    // ID penyakit hasil diagnosis, Umur pengguna, Nama pengguna, ID user yang melakukan diagnosis, Alamat pengguna, Nilai akhir perhitungan CF, Nama penyakit yang terdeteksi, Gejala yang dipilih pengguna (biasanya dalam bentuk array/JSON)
    
    /**
     * Relasi ke model Desease (penyakit).
     * Menyatakan bahwa diagnosis ini hanya terkait satu penyakit.
     */
    public function desease(): HasOne
    {
        return $this->hasOne(Desease::class, 'kode_penyakit', 'kode_penyakit');
    }

    /**
     * Relasi ke model User.
     * Diagnosis ini dimiliki oleh satu pengguna (user).
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'kode_pengguna');
    }
}
