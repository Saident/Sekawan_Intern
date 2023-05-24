<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\PemesananKendaraan;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $pesanan = PemesananKendaraan::all();
        $drivers = [];
        $kendaraans = [];
        $counter = -1;

        if ($pesanan->isEmpty()) {
            return view('dashboard', [
                "pesanan" => $pesanan,
                "kendaraan" => '',
                "kendaraan_id" => '',
                "status" => '',
                "driver" => '',
            ]);
        } else {
            foreach ($pesanan as $pemesanan) {
                $drivers[] = Driver::where('id', 'like', $pemesanan->driver_id)->first();
                $kendaraans[] = Kendaraan::where('id', 'like', $pemesanan->kendaraan_id)->first();
                $counter++;
            }
            
            return view('dashboard', [
                "pesanan" => $pesanan,
                "kendaraan" => $kendaraans[$counter]->jenis,
                "kendaraan_id" => $kendaraans[$counter]->id,
                "status" => $kendaraans[$counter]->status,
                "driver" => $drivers[$counter]->nama,
            ]);
        }
    }


    public function profile()
    {
        return view('profile');
    }
}
