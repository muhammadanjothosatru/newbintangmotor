<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('users','pelanggan','kendaraan')->get();
        return view('transaksi.index', ['transaksi'=>$transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = Kendaraan::all();
        return view('transaksi.create', compact('pelanggan','kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'diskon' => 'required',
            'harga_akhir' => 'required',
        ]);

        if($request->metode_pembayaran=='Tunai'){
            $transaksi = Transaksi::create([
                'pelanggan_id'=> $request->nama,
                'kendaraan_no_pol' => $request->no_pol,
                'metode_pembayaran'=>$request->metode_pembayaran,
                'diskon'=>$request->diskon,
                'harga_akhir'=>$request->harga_akhir,
                'no_kontrak'=>'-',
                'uang_dp'=>'-',
                'bulan_angsuran'=>'-',
                'keterangan'=>"-",
                'users_id'=>Auth::id(),
            ]);
        }elseif($request->metode_pembayaran=='Kredit'){

        $transaksi = Transaksi::create([
            'pelanggan_id'=> $request->nama,
            'kendaraan_no_pol' => $request->no_pol,
            'metode_pembayaran'=>$request->metode_pembayaran,
            'diskon'=>$request->diskon,
            'harga_akhir'=>$request->harga_akhir,
            'no_kontrak'=>$request->no_kontrak,
            'uang_dp'=>$request->uang_dp,
            'bulan_angsuran'=>$request->bulan_angsuran,
            'keterangan'=>$request->keterangan,
            'users_id'=>Auth::id(),
        ]);
      
    }
    Kendaraan::where('no_pol', $request->no_pol)->update(['status_kendaraan' => 'Terjual']);
    return redirect('/transaksi')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
