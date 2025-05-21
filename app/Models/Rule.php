<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Mendukung penggunaan factory saat testing/seeding
use Illuminate\Database\Eloquent\Model; // Kelas model dasar Laravel
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rule extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_pengetahuan'; // Menentukan kolom primary key
    // Kolom-kolom yang boleh diisi massal (mass assignable)
    protected $fillable = ['kode_penyakit', 'kode_gejala', 'cf_pakar', 'mb_pakar', 'md_pakar'];
    // Kode penyakit yang berkaitan, Kode gejala yang terkait dengan aturan ini, Nilai certainty factor hasil dari (mb - md), Measure of Belief (keyakinan pakar), Measure of Disbelief (keraguan pakar)
    
    /**
     * Relasi ke model Indication (Gejala)
     * Setiap rule memiliki satu gejala yang terhubung.
     * Rule.kode_gejala → Indication.kode_gejala
     */
    public function indication(): HasOne
    {
        return $this->hasOne(Indication::class, 'kode_gejala', 'kode_gejala');
    }

    /**
     * Relasi ke model Desease (Penyakit)
     * Setiap rule memiliki satu penyakit yang terkait.
     * Rule.kode_penyakit → Desease.kode_penyakit
     */
    public function desease(): HasOne
    {
        return $this->hasOne(Desease::class, 'kode_penyakit', 'kode_penyakit');
    }
}
