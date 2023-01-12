<?php

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\LoginAdminController;
use App\Http\Controllers\Landing\DataController;
use App\Http\Controllers\Landing\CarouselController;


use App\Http\Controllers\Pos\UserController;
use App\Http\Controllers\Pos\LoginController;
use App\Http\Controllers\Pos\MobilController;
use App\Http\Controllers\Pos\CabangController;
use App\Http\Controllers\Pos\LaporanController;
use App\Http\Controllers\Pos\DashboardController;
use App\Http\Controllers\Pos\KendaraanController;
use App\Http\Controllers\Pos\PelangganController;
use App\Http\Controllers\Pos\TransaksiController;
use App\Http\Controllers\Pos\LaporanMobilController;



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


Route::get('/', [LandingController::class,'index'])->middleware('guest')->name('landingpage');
Route::get('/adminlogin', [LoginAdminController::class,'index'])->middleware('guest');
Route::post('/adminlogin', [LoginAdminController::class,'authenticate'])->name('adminlogin');
Route::post('/adminlogout', [LoginAdminController::class,'logout']);

Route::group(['middleware' => ['guest']], function(){
    Route::resources([
        'landing' => LandingController::class
    ]);
    Route::get('/{id}/detail',[LandingController::class,'detail'])->name('landing.detail');
    Route::post('/{id}/whatsapp',[LandingController::class,'waproduct'])->name('landing.waproduct');
    Route::post('/whatsapp', [LandingController::class, 'whatsapp'])->name('landing.whatsapp');
});

// group middleware agar login terlebih dahulu baru bisa akses dashboard dkk //
Route::group(['middleware' => ['auth','cekrole:0']], function(){
    Route::resources([
        'datamanagement' => DataController::class,
        'carousel' => CarouselController::class,
    ]);
    Route::get('datamanagement/{id}/detail',[DataController::class,'detail'])->name('datamanagement.detail');
    Route::get('datamanagement/{id}/edit',[DataController::class,'edit'])->name('datamanagement.edit');
    Route::get('carousel/{id}/edit',[CarouselController::class,'edit'])->name('carousel.edit');
});

// POS

// start pages to login //
Route::get('/pos', function(){
 return view('pos.auth.login');
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
