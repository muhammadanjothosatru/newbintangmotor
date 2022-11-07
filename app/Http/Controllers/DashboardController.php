<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kendaraan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        self::changestatus();
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
                $year = Carbon::now()->format('Y');

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
                        $transaksitotal
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
                        ->select(DB::raw('sum(transaksi.harga_akhir - (kendaraan.harga_beli + transaksi.komisi)) as total_keuntungan'));
                    } else if (Auth::user()->role == 2) {
                        $keuntungan->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Mobil')
                        ->whereMonth('transaksi.created_at', $month)
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->select(DB::raw('sum(transaksi.harga_akhir - (kendaraan.harga_beli + transaksi.komisi)) as total_keuntungan'));
                    } else if (Auth::user()->role == 0) {
                        $keuntungan
                        ->whereMonth('transaksi.created_at', $month)
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->select(DB::raw('sum(transaksi.harga_akhir - (kendaraan.harga_beli + transaksi.komisi)) as total_keuntungan'));
                    }
                    $all_keuntungan=$keuntungan->get();

                $pembelian = DB::table('transaksi')
                    ->join('users','transaksi.users_id', '=', 'users.id')
                    ->join('kendaraan','transaksi.kendaraan_no_pol', '=', 'kendaraan.no_pol');
                    if (Auth::user()->role == 1) {
                        $pembelian->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->whereBetween('transaksi.created_at', [Carbon::now()->subYear(), Carbon::now()])
                        ->select('transaksi.id', 'transaksi.created_at');
                    } else if (Auth::user()->role == 2) {
                        $pembelian->where('users.cabang_id', Auth::user()->cabang_id)
                        ->where('kendaraan.jenis', '=', 'Mobil')
                        ->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->whereBetween('transaksi.created_at', [Carbon::now()->subYear(), Carbon::now()])
                        ->select('transaksi.id', 'transaksi.created_at');
                    } else if (Auth::user()->role == 0) {
                        $pembelian->where('kendaraan.status_kendaraan', '=', 'Terjual')
                        ->whereBetween('transaksi.created_at', [Carbon::now()->subYear(), Carbon::now()])
                        ->select('transaksi.id', 'transaksi.created_at');
                    }
                    $all_pembelianperbulan=$pembelian->get()->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('m');
                    });;

                    //dd($month);

                    $usermcount = [];
                    $pembelianperbulan = [];
                    $bulanterakhir=[];
                    $daftarbulan=['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
                    
                    foreach ($all_pembelianperbulan as $key => $value) {
                        $usermcount[(int)$key] = count($value);
                    }
                    
                    for($i = 1; $i <= 12; $i++){
                        $bulan = $i+(int)$month;
                        if($bulan > 12){
                            $bulan = $bulan-12;
                        }
                        if(!empty($usermcount[$bulan])){
                            $pembelianperbulan[$i] = $usermcount[$bulan];
                            $bulanterakhir[$i] = $daftarbulan[$bulan-1];   
                        }else{
                            $pembelianperbulan[$i] = 0;    
                            $bulanterakhir[$i] = $daftarbulan[$bulan-1];
                        }
                    }

                    $pembelianperbulan = array_values($pembelianperbulan);
                    $bulanterakhir = array_values($bulanterakhir);
                    
                    


        return view('pages.dashboard',compact('allkendaraan', 'all_transaksi', 'all_keuntungan', 'pembelianperbulan', 'bulanterakhir')); 
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

    
    public function changestatus(){
        $kendaraan =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id')
                ->join('transaksi','kendaraan.no_pol', '=', 'kendaraan_no_pol');
                if (Auth::user()->role == 1) {
                    $kendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                if (Auth::user()->role == 2) {
                    $kendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                if (Auth::user()->role == 0) {
                    $kendaraan->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                $kendaraanterjual=$kendaraan->get();
        
        foreach ($kendaraanterjual as $terjual) {
            Kendaraan::where('no_pol', '=', $terjual->no_pol)->update(['status_kendaraan'=>'Terjual']);
        }
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
