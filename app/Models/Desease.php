<?php

namespace App\Models;

use App\Helpers\UniqueId; // Trait untuk membuat ID unik (kode penyakit)
use Illuminate\Database\Eloquent\Factories\HasFactory; // Trait untuk factory (testing/seeder)
use Illuminate\Database\Eloquent\Model; // Kelas dasar Eloquent ORM
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tipe relasi: belongsTo

class Desease extends Model
{
    use HasFactory, UniqueId; // Mengaktifkan fitur factory & ID otomatis dari trait
    public $incrementing = false; // Menonaktifkan auto-increment karena ID (kode_penyakit) berupa string
    protected $primaryKey = 'kode_penyakit'; // Menentukan kolom primary key
    protected $fillable = ['nama_penyakit', 'detail_penyakit', 'solusi_penyakit']; // Kolom yang boleh diisi (mass assignable) saat insert/update

    /**
     * Relasi ke model Rule.
     * Penyakit ini terkait dengan banyak rule (aturan) secara logis,
     * tetapi karena ini relasi belongsTo, hanya mengambil satu rule utama.
     */
    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class, 'kode_penyakit', 'kode_penyakit');
    }

    /**
     * Relasi ke model Diagnosis.
     * Menyatakan bahwa penyakit ini bisa muncul di data diagnosis tertentu.
     */
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'kode_penyakit', 'kode_penyakit');
    }
}
