<?php

namespace App\Http\Controllers\Admin;

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
        //TODO : add filter telah dipesan

        $admin_id = $request->admin_id;
        $driver = $request->driver_id;
        $kendaraan = $request->kendaraan_id;

        $kendaraan = Kendaraan::where('id', $kendaraan)->update([
            'jadwal_service' => now()->addMonths(2),
            'riwayat_pemakaian' => now(),
            'status' => 'Dipesan',
            'bbm' => +1300
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
