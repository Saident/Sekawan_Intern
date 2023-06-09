<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->action([\App\Http\Controllers\SiteController::class, 'dashboard']);
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\SiteController::class, 'dashboard'])->name('dashboard');

    Route::post('confirm/{id}', [\App\Http\Controllers\AcceptController::class, 'konfirmasiPesanan'])->name('confirm');
    Route::post('cancel/{id}', [\App\Http\Controllers\AcceptController::class, 'tolakPesanan'])->name('cancel');
    Route::post('accept/{id}', [\App\Http\Controllers\AcceptController::class, 'setujuiPesanan'])->name('accept');
    Route::post('return/{id}', [\App\Http\Controllers\AcceptController::class, 'kembaliPesanan'])->name('return');


    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');

    
    /**
     * /home -> list request kendaraan
     * /persetujuan/{status}/{pesanan_id} -> meyimpan ke table kendaraan masukin data dipakai
     * /konfirmasi
     */
});
