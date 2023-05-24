<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\PemesananKendaraan;
use App\Models\Log;

class AcceptController extends Controller
{
    //TODO : buat function konfirmasi + menolak
    public function konfirmasiPesanan(Request $request){
        $id = $request->id;
        $kendaraans = Kendaraan::where('id', $id)->update([
            'status' => 'Diproses'
        ]);

        return redirect()->action([\App\Http\Controllers\SiteController::class, 'dashboard']);
    }
    public function setujuiPesanan(Request $request){
        $id = $request->id;
        $kendaraans = Kendaraan::where('id', $id)->update([
            'status' => 'Sedang Digunakan'
        ]);

        return redirect()->action([\App\Http\Controllers\SiteController::class, 'dashboard']);
    }
    public function tolakPesanan(Request $request){
        $id = $request->id;
        Kendaraan::where('id', $id)->update([
            'status' => 'Tersedia'
        ]);
        PemesananKendaraan::where('kendaraan_id', $id)->delete();

        $kendaraans = Kendaraan::where('id', $id)->first();
        Log::where('kendaraan', $kendaraans->nama)->update([
            'tanggal_ditolak' => now(),
        ]);

        return redirect()->action([\App\Http\Controllers\SiteController::class, 'dashboard']);
    }
    public function kembaliPesanan(Request $request){
        $id = $request->id;
        Kendaraan::where('id', $id)->update([
            'status' => 'Tersedia'
        ]);
        PemesananKendaraan::where('kendaraan_id', $id)->delete();

        $kendaraans = Kendaraan::where('id', $id)->first();
        Log::where('kendaraan', $kendaraans->nama)->update([
            'tanggal_pengembalian' => now(),
        ]);

        return redirect()->action([\App\Http\Controllers\SiteController::class, 'dashboard']);
    }
}
