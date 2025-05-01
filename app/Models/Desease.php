<?php

namespace App\Models;

use App\Helpers\UniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Desease extends Model
{
    use HasFactory, UniqueId;
    public $incrementing = false;
    protected $primaryKey = 'kode_penyakit';
    protected $fillable = ['nama_penyakit', 'detail_penyakit', 'solusi_penyakit'];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class, 'kode_penyakit', 'kode_penyakit');
    }
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(Diagnosis::class, 'kode_penyakit', 'kode_penyakit');
    }
}
