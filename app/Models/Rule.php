<?php

namespace App\Models;

use App\Helpers\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rule extends Model
{
    use HasFactory;
    // public $incrementing = false;
    protected $primaryKey = 'kode_pengetahuan';
    protected $fillable = ['kode_penyakit', 'kode_gejala', 'cf_pakar', 'mb_pakar', 'md_pakar'];

    // public function diagnose(): BelongsTo
    // {
    //     return $this->belongsTo(Diagnosis::class, 'diagnosis_id', 'diagnosis_id');
    // }
    public function indication(): HasOne
    {
        return $this->hasOne(Indication::class, 'kode_gejala', 'kode_gejala');
    }
    public function desease(): HasOne
    {
        return $this->hasOne(Desease::class, 'kode_penyakit', 'kode_penyakit');
    }
}
