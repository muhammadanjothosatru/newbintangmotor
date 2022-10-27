<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahkendaraan =DB::table('kendaraan')
            ->join('users','kendaraan.users_id', '=', 'users.id');
             
                if (Auth::user()->role == 1) {
                    $jumlahkendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->where('status_kendaraan', '=', 'Tersedia')
                                ->select(DB::raw('count(no_pol) as total_kendaraan'));
                }
                if (Auth::user()->role == 2) {
                    $jumlahkendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->where('status_kendaraan', '=', 'Tersedia')
                                ->select(DB::raw('count(no_pol) as total_kendaraan'));
                }
                if (Auth::user()->role == 0) {
                $jumlahkendaraan->where('status_kendaraan', '=', 'Tersedia')
                                // ->where('status_kendaraan', '=', 'Tersedia')
                                ->select(DB::raw('count(no_pol) as total_kendaraan'));
                }
                $allkendaraan=$jumlahkendaraan->get();

                //Total Transaksi
                
                $month = Carbon::now()->format('m');
                // dd($month);

                $transaksitotal =DB::table('transaksi')
                    ->join('users','transaksi.users_id', '=', 'users.id')
                    ->join('pelanggan','transaksi.pelanggan_id', '=', 'pelanggan.id')
                    ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol');
                    if (Auth::user()->role == 1) {
                        $transaksitotal->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                        ->whereMonth('transaksi.created_at', $month)
                        ->select(DB::raw('count(no_pol) as total_transaksi'));
                    } else if (Auth::user()->role == 2) {
                        $transaksitotal->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Mobil')
                        ->whereMonth('transaksi.created_at', $month)
                        ->select(DB::raw('count(no_pol) as total_transaksi'));
                    } else if (Auth::user()->role == 0) {
                        $transaksitotal->where('kendaraan.jenis', '=', 'Sepeda Motor')
                        ->whereMonth('transaksi.created_at', $month)
                        ->select(DB::raw('count(no_pol) as total_transaksi'));
                    }
                    $all_transaksi=$transaksitotal->get();

                //Keuntungan

                $keuntungan = DB::table('transaksi')
                    ->join('users','transaksi.users_id', '=', 'users.id')
                    ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol');
                    if (Auth::user()->role == 1) {
                        $keuntungan->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                        ->whereMonth('transaksi.created_at', $month)
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->select(DB::raw('sum(harga_akhir - harga_beli) as total_keuntungan'));
                    } else if (Auth::user()->role == 2) {
                        $keuntungan->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Mobil')
                        ->whereMonth('transaksi.created_at', $month)
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->select(DB::raw('sum(harga_akhir - harga_beli) as total_keuntungan'));
                    } else if (Auth::user()->role == 0) {
                        $keuntungan->where('kendaraan.jenis', '=', 'Sepeda Motor')
                        ->whereMonth('transaksi.created_at', $month)
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->select(DB::raw('sum(harga_akhir - harga_beli) as total_keuntungan'));
                    }
                    $all_keuntungan=$keuntungan->get();


        return view('pages.dashboard',compact('allkendaraan', 'all_transaksi', 'all_keuntungan')); 
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
