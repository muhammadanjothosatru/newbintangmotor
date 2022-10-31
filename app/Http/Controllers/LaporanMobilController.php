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
        $laporan_mobil =DB::table('transaksi')
        ->join('users','transaksi.users_id', '=', 'users.id')
        ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
        ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol');
        if (Auth::user()->role == 2) {
            $laporan_mobil->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Mobil')
                        ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna', 'kendaraan.harga_beli');
        
        } else if (Auth::user()->role == 0) {
            $laporan_mobil->where('kendaraan.jenis', '=', 'Mobil')
                        ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna', 'kendaraan.harga_beli');
        }
        $all_laporan_mobil=$laporan_mobil->get();
        return view('laporan.mobil', compact('all_laporan_mobil'));
    }
}
