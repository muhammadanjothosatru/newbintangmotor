<?php

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

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
// start pages to login //
Route::get('/', function(){
 return view('auth.login');
});

// route login dan logout//
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'])->name('login');
Route::post('/logout', [LoginController::class,'logout']);

// group middleware agar login terlebih dahulu baru bisa akses dashboard dkk //
Route::group(['middleware' => ['auth','cekrole:0,1,2']], function(){
    Route::resources([
        'dashboard' => DashboardController::class,
        'pelanggan' => PelangganController::class,
        'kendaraan' => KendaraanController::class,
        'transaksi' => TransaksiController::class,
        'laporan' => LaporanController::class,
    ]);
    Route::get('/pelanggan/ubah/{id}',[PelangganController::class,'ubah'])->name('pelanggan.ubah');
    Route::get('/kendaraan-mobil', [KendaraanController::class,'mobil']);
    Route::get('/kendaraan/{no_pol}/detail',[KendaraanController::class,'detail'])->name('kendaraan.detail');
});
