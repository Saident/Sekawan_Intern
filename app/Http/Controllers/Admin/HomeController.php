<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\PemesananKendaraan;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view("admin.index", [
            "kendaraan" => $kendaraan
        ]);
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
