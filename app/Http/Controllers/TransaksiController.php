<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $transaksi_lamongan_motor =DB::table('transaksi')
                ->join('users','transaksi.users_id', '=', 'users.id')
                ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
                ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol')
                ->where('users.cabang_id', '=', '1')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->select('kendaraan.*','transaksi.*','pelanggan.*','users.*')
                ->get();
        $transaksi_babat_motor =DB::table('transaksi')
                ->join('users','transaksi.users_id', '=', 'users.id')
                ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
                ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol')
                ->where('users.cabang_id', '=', '2')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->select('kendaraan.*','transaksi.*','pelanggan.*','users.*')
                ->get();
        $transaksi_motor = DB::table('transaksi')
                ->join('users','transaksi.users_id', '=', 'users.id')
                ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
                ->join('kendaraan','transaksi.kendaraan_no_pol','=','kendaraan.no_pol')        
                ->where('kendaraan.jenis','=','Sepeda Motor')
                ->select('kendaraan.*','transaksi.*','pelanggan.*','users.*')
                ->get();
        // $transaksi = Transaksi::with('users','pelanggan','kendaraan')->get();
        return view('transaksi.index', compact('transaksi_lamongan_motor','transaksi_babat_motor','transaksi_motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $kendaraan = DB::table('kendaraan')
                    ->where('kendaraan.status_kendaraan','=','Tersedia')
                    ->select('kendaraan.*')
                    ->get();
        $motorlamongan =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id')
                ->where('users.cabang_id', '=', '1')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                ->select('kendaraan.*')
                ->get();
        $motorbabat =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id')
                ->where('users.cabang_id', '=', '2')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                ->select('kendaraan.*')
                ->get();
       
        return view('transaksi.create',compact('pelanggan','kendaraan','motorlamongan','motorbabat'));
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
            'harga_akhir' => 'required|numeric',
        ]);

        if($request->metode_pembayaran=='Tunai'){
            $transaksi = Transaksi::create([
                'pelanggan_id'=> $request->nama,
                'kendaraan_no_pol' => $request->no_pol,
                'metode_pembayaran'=>$request->metode_pembayaran,
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
            'harga_akhir'=>$request->harga_akhir,
            'no_kontrak'=>'-',
            'uang_dp'=>$request->uang_dp,
            'bulan_angsuran'=>$request->bulan_angsuran,
            'keterangan'=>'Belum ACC',
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
