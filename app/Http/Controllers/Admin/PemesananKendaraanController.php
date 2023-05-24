<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\User;
use App\Models\Tambang;
use App\Models\PemesananKendaraan;
use App\Models\Log;

class PemesananKendaraanController extends Controller
{
    public function pesanKendaraan(Request $request){
        //TODO : add filter telah dipesan

        $admin = $request->admin_id;
        $driver = $request->driver_id;
        $kendaraan = $request->kendaraans_id;
        $user_id = $request->user_id;

        Kendaraan::where('id', $kendaraan)->update([
            'jadwal_service' => now()->addMonths(2),
            'riwayat_pemakaian' => now(),
            'status' => 'Dipesan',
            'bbm' => +1300
        ]);

        $pemesanan = PemesananKendaraan::create([
            'admin_id' => $admin,
            'driver_id' => $driver,
            'kendaraan_id' => $kendaraan,
            'user_id' => $user_id,
        ]);

        $kendaraans = Kendaraan::where('id', $kendaraan)->first();

        $tambang = User::where('user_id', $user_id)->first();
        $lokasi = Tambang::where('id', $tambang->id)->first();

        $logData = Log::Create([
            'admin' => Auth::user()->name,
            'kendaraan' => $kendaraans->nama,
            'kendaraan_id' => $kendaraans->id,
            'lokasi' => $lokasi->lokasi,
            'pemesanan_id' => $pemesanan->id,
            'tanggal_pemesanan' => now(),
        ]);

        return redirect()->action([\App\Http\Controllers\Admin\HomeController::class, 'index']);
    }
}
