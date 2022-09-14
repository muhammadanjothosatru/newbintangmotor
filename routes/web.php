<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Models\Kendaraan;

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
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::get('/pelanggan/ubah/{id}',[PelangganController::class,'ubah'])->name('pelanggan.ubah');
    Route::resource('/kendaraan', KendaraanController::class);
    Route::get('/kendaraan/lamongan', [KendaraanController::class,'adminLamongan'])->name('adminLamongan');
    Route::get('/kendaraan/{no_pol}/detail',[KendaraanController::class,'detail'])->name('kendaraan.detail');
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/laporan', LaporanController::class);
});
