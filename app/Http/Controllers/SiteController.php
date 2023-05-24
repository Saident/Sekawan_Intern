<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\Tambang;
use App\Models\PemesananKendaraan;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
{
    $user_id = Auth::id();
    $tambang = Tambang::where('user_id', $user_id)->first();
    $pesanan = $tambang->pemesananKendaraans;

    if ($pesanan->isEmpty()) {
        return view('dashboard', [
            "pesanan" => $pesanan,
            "kendaraan" => '',
            "kendaraan_id" => '',
            "status" => '',
            "driver" => '',
        ]);
    } else {
        $lastPesanan = $pesanan->last();
        return view('dashboard', [
            "pesanan" => $pesanan,
            "kendaraan" => $lastPesanan->kendaraan->nama,
            "kendaraan_id" => $lastPesanan->kendaraan->id,
            "status" => $lastPesanan->kendaraan->status,
            "driver" => $lastPesanan->driver->nama,
        ]);
    }
}



    public function profile()
    {
        return view('profile');
    }
}
