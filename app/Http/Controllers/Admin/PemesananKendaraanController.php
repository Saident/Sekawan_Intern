<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\PemesananKendaraan;

class PemesananKendaraanController extends Controller
{
    public function pesanKendaraan(Request $request){
        $admin_id = Auth::user()->id;
        $driver = $request->driver_id;
        $kendaraan = $request->kendaraan_id;

        $kendaraans = Kendaraan::where('id', 'like', $kendaraan)->get();
        $kendaraans->update([
            'jadwal_service' => now()->addMonths(2),
            'riwayat_pemakaian' => now(),
            'bbm' => 1300
        ]);

        $pemesanan = PemesananKendaraan::create([
            'admin_id' => $admin_id,
            'driver_id' => $driver,
            'kendaraan_id' => $kendaraan,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Pemesanan has been added.",
            'pemesanan' => $pemesanan,
        ], 200);
    }
}
