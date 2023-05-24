<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'status',
        'kepemilikan',
        'tambang_id'
    ];

    /**
     * Get the user that owns the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tambang(): BelongsTo
    {
        return $this->belongsTo(tambang::class);
    }
}
