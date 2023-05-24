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
        'kendaraan_id'
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

    public function driver(): HasOne
    {
        return $this->hasOne(driver::class);
    }

    public function kendaraan(): HasOne
    {
        return $this->hasOne(kendaraan::class);
    }
}
