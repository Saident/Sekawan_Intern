<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tambang extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi',
        'user_id'
    ];

    /**
     * Get the user associated with the Tambang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(user::class, 'user_id');
    }

    /**
     * Get all of the comments for the Tambang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kendaraan(): HasMany
    {
        return $this->hasMany(kendaraan::class);
    }
}
