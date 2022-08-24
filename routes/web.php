<?php

use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('auth/login');
// });
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');
Route::get('/kendaraan', function () {
    return view('pages/kendaraan');
});
Route::get('/login-user',[LoginController::class,'coba'])->name('coba');
// Route::get('/login', function () {
//     return view('auth/login');
// });

