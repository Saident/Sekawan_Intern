<?php

namespace App\Http\Controllers\Admin;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\Tambang;
use App\Models\PemesananKendaraan;
use App\Models\Log;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all()->where('status', 'Tersedia');
        $driver = Driver::all();
        $user = User::all();
        $admin_id = Auth::id();

        $orderData = Log::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('tanggal_pemesanan', date('Y'))
                    ->groupBy(\DB::raw("Month(tanggal_pemesanan)"))
                    ->pluck('count');

        return view("admin.index", [
            "kendaraans" => $kendaraan,
            "drivers" => $driver,
            "users" => $user,
            "admin_id" => $admin_id,
            "orderData" => $orderData,
        ]);
    }

    public function exportData(){
        $data = Log::all();
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($data as $rowIndex => $row) {
            $attributes = $row->getAttributes();
            $keys = array_keys($attributes);
            for ($i = 0; $i < count($keys); $i++) {
                $cellValue = $attributes[$keys[$i]];
                $sheet->setCellValueByColumnAndRow($i + 1, $rowIndex + 1, $cellValue);
            }
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('dataExport.xlsx');
    
        return redirect()->action([\App\Http\Controllers\Admin\HomeController::class, 'index']);
    }
    

    public function profile()
    {
        return view('admin.profile');
    }
}
