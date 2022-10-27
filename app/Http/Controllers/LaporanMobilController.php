<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class LaporanMobilController extends Controller
{
    public function index()
    {
        $transaksimobil = Transaksi::with('users','pelanggan','kendaraan')->get();
        // return view('laporan.index', ['transaksi'=>$transaksimobil]);
        return view('laporan.mobil',compact('transaksimobil'));
    }
}
