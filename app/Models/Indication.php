<?php

namespace App\Models;

use App\Helpers\UniqueId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Indication extends Model
{
    use HasFactory, UniqueId;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;
    protected $primaryKey = 'kode_gejala';
    protected $fillable = ['nama_gejala'];

    // public function rule(): BelongsTo
    // {
    //     return $this->belongsTo(Rule::class, 'kode_gejala', 'kode_gejala');
    // }
}
