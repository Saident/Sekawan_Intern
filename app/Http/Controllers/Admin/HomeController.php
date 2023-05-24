<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\PemesananKendaraan;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        $driver = Driver::all();

        $drivers = [];
        $kendaraans = [];

        $counterk = -1;
        $counterd = -1;

        foreach ($kendaraan as $kendaraan) {
            $kendaraans[] = Kendaraan::where('id', 'like', $kendaraan->id)->first();
            $counterk++;
        }

        foreach ($driver as $driver) {
            $drivers[] = Driver::where('id', 'like', $driver->id)->first();
            $counterd++;
        }

        return view("admin.index", [
            "kendaraan" => $kendaraans[$counterk],
            "driver" => $drivers[$counterd],
            "admin_id" => Auth::user()->id,
        ]);
    }

    public function passData(){}

    public function profile()
    {
        return view('admin.profile');
    }
}
