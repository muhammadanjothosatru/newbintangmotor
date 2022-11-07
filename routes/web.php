<?php

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanMobilController;



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
    Route::get('/kendaraan/{no_pol}/detail',[KendaraanController::class,'detail'])->name('kendaraan.detail');
    Route::get('/transaksi/{id}/invoice', [TransaksiController::class,'invoice'])->name('transaksi.invoice');
    Route::get('/transaksi/{id}/detail', [TransaksiController::class,'detail'])->name('transaksi.detail');
    
});
// Hanya bisa diakses oleh Super Admin
Route::group(['middleware' => ['auth','cekrole:0']], function(){
    Route::resource('user', UserController::class);
    Route::resource('cabang', CabangController::class);
    Route::get('/user/{id}/ubahPassword',[UserController::class,'ubahPassword'])->name('user.ubahPassword');
    Route::post('/user/ubahPassword/{id}',[UserController::class,'updatePassword'])->name('user.updatePassword');
});
// Hanya bisa diakses oleh Super Admin dan Admin Mobil
Route::group(['middleware' => ['auth','cekrole:0,2']], function(){
    Route::get('/kendaraan-mobil', [KendaraanController::class,'mobil']);
    Route::get('/transaksi-mobil', [TransaksiController::class,'mobil']);
    Route::get('/laporan-mobil', [LaporanMobilController::class,'index']);
});
