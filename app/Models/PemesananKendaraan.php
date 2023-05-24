<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'driver_id',
        'kendaraan_id',
        'tambang_id',
        'user_id',
    ];

    /**
     * Get the user associated with the Pemesanan_Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin(): HasOne
    {
        return $this->hasOne(admin::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function tambang(): HasOne
    {
        return $this->hasOne(tambang::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(user::class);
    }
}
