<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Facades\Invoice;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransaksiController extends Controller
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
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna')
                                ->orderBy('transaksi.created_at', 'desc');
                } else if (Auth::user()->role == 2) {
                    $transaksi_motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna')
                                ->orderBy('transaksi.created_at', 'desc');
                } else if (Auth::user()->role == 0) {
                    $transaksi_motor->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->select('transaksi.*', 'pelanggan.nama', 'kendaraan.no_pol','kendaraan.merk', 'kendaraan.tipe', 'kendaraan.tahun_pembuatan', 'kendaraan.warna')
                                ->orderBy('transaksi.created_at', 'desc');
                }
                $all_transaksi_motor=$transaksi_motor->get();
                return view('transaksi.index', compact('all_transaksi_motor'));
        
                //Function mobil blade
                //code.......
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
        $motor =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id');
                if (Auth::user()->role == 1) {
                    $motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                if (Auth::user()->role == 2) {
                    $motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                if (Auth::user()->role == 0) {
                    $motor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
               
                $all_kendaraan=$motor->get();
        return view('transaksi.create', compact('pelanggan','kendaraan','all_kendaraan'));
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
            'harga_akhir' => 'required',
        ]);

        if($request->metode_pembayaran=='Tunai'){
            $transaksi = Transaksi::create([
                'pelanggan_id'=> $request->nama,
                'kendaraan_no_pol' => $request->no_pol,
                'metode_pembayaran'=>$request->metode_pembayaran,
                'harga_akhir'=>preg_replace('/[^0-9]/', '', $request->harga_akhir) - preg_replace('/[^0-9]/', '', $request->komisi),
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
            'harga_akhir'=>preg_replace('/[^0-9]/', '', $request->harga_akhir),
            'no_kontrak'=>'-',
            'uang_dp'=>preg_replace('/[^0-9]/', '', $request->uang_dp),
            'bulan_angsuran'=>$request->bulan_angsuran,
            'keterangan'=>'Belum ACC',
            'users_id'=>Auth::id(),
        ]);
      
    }
    Kendaraan::where('no_pol', $request->no_pol)->update(['status_kendaraan' => 'Terjual']);
    return redirect('/transaksi')->with('success','data berhasil ditambahkan')->with('message', $transaksi->id);
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
    public function edit($id)
    {
        // $transaksi = Transaksi::findorfail($id);

        // $pelanggan = Pelanggan::findorfail($transaksi->pelanggan_id);
        // $kendaraan = Kendaraan::findorfail($transaksi->kendaraan_no_pol);
        

        // return view('transaksi.edit', compact('transaksi', 'pelanggan', 'kendaraan'));
    }

    public function detail($id)
    {
        $transaksi = Transaksi::findorfail($id);

        $pelanggan = Pelanggan::findorfail($transaksi->pelanggan_id);
        $kendaraan = Kendaraan::findorfail($transaksi->kendaraan_no_pol);
        

        return view('transaksi.detail', compact('transaksi', 'pelanggan', 'kendaraan'));
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

    public function invoice($id)
    {
        $transaksi = Transaksi::findorfail($id);
        
        $pelanggan = Pelanggan::findorfail($transaksi->pelanggan_id);
        $kendaraan = Kendaraan::findorfail($transaksi->kendaraan_no_pol);

        $customer = new Buyer([
            'name'          => $pelanggan->nama,
            'address'       => $pelanggan->alamat,
        ]);

        $biaya = 0;
        if($transaksi->metode_pembayaran == "Kredit"){
            $biaya = $transaksi->uang_dp;
        } else {
            $biaya = $transaksi->harga_akhir;
        }

        $item = (new InvoiceItem())
        ->title($kendaraan->merk)
        ->jenis($kendaraan->jenis)
        ->warna($kendaraan->warna)
        ->tahun($kendaraan->tahun_pembuatan)
        ->nopol($kendaraan->no_pol)
        ->nosin($kendaraan->no_mesin)
        ->noka($kendaraan->no_rangka)
        ->nobpkb($kendaraan->no_bpkb)
        ->ketlain($transaksi->keterangan)
        ->pricePerUnit($biaya);

        $invoice = Invoice::make()
            ->logo(public_path('images/logo2.png'))
            ->bg_kwitansi(public_path('images/bg_kwitansi.png'))
            ->buyer($customer)
            ->addItem($item);

        return $invoice->stream();
    }
}
