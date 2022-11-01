<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $transaksi_motor =DB::table('transaksi')
                ->join('users','transaksi.users_id', '=', 'users.id')
                ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
                ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol');
                if (Auth::user()->role == 1) {
                    $transaksi_motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna', 'kendaraan.harga_beli');
                } else if (Auth::user()->role == 2) {
                    $transaksi_motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna', 'kendaraan.harga_beli');
                } else if (Auth::user()->role == 0) {
                    $transaksi_motor->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna', 'kendaraan.harga_beli');
                }
                $all_transaksi_motor=$transaksi_motor
                ->orderBy('transaksi.created_at', 'desc')
                ->get();
                return view('laporan.index', compact('all_transaksi_motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
