<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin',
        'kendaraan',
        'kendaraan_id',
        'lokasi',
        'pemesanan_id',
        'tanggal_pemesanan',
        'tanggal_pengembalian',
        'tanggal_ditolak'
    ];
}
