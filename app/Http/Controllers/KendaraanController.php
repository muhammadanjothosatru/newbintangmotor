<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        $adminlamongan =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id')
                ->where('users.cabang_id', '=', '1')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->select('kendaraan.*')
                ->get();
        $adminbabat =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id')
                ->where('users.cabang_id', '=', '2')
                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                ->select('kendaraan.*')
                ->get();
        $data = [
            'adminlamongan'=> $adminlamongan,
            'adminbabat'=> $adminbabat,
            'kendaraan'=> $kendaraan,
        ];
        return view('kendaraan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminLamongan()
    {
        
    }
    public function create()
    {
        return view('kendaraan.create');
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
            'no_pol' => 'required|unique:kendaraan',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_pembuatan' => 'required|numeric',
            'daya_listrik' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            'tahun_registrasi' => 'required',
            'no_bpkb' => 'required',
            'harga_beli' => 'required|numeric',
            'tanggal_masuk' => 'required',
        
        ]);
        $kendaraan = Kendaraan::create([
            'no_pol' => $request->no_pol,
            'users_id' => Auth::user()->id,
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'model' => $request->model,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'daya_listrik' => $request->daya_listrik,
            'no_rangka' => $request->no_rangka,
            'no_mesin' => $request->no_mesin,
            'warna' => $request->warna,
            'status_kendaraan' =>"Tersedia",
            'tahun_registrasi' => $request->tahun_registrasi,
            'no_bpkb' => $request->no_bpkb,
            'harga_beli' => $request->harga_beli,
            'tanggal_masuk' => $request->tanggal_masuk,
            'supplier' => $request->supplier,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/kendaraan')->with('success','data berhasil ditambahkan');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function detail($no_pol)
    {
        $kendaraan = Kendaraan::findorfail($no_pol);
        $kendaraan_cabang = Kendaraan::with('users.cabang')->get();
        return view('kendaraan.detail', compact('kendaraan'));
    }
    public function edit($no_pol)
    {
        $kendaraan = Kendaraan::findorfail($no_pol);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_pol)
    {
        
        $validate= $request->validate([
            'no_pol' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_pembuatan' => 'required|numeric',
            'daya_listrik' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            'tahun_registrasi' => 'required',
            'status_kendaraan' => 'required',
            'no_bpkb' => 'required',
            'harga_beli' => 'required|numeric',
            'tanggal_masuk' => 'required',
        
    ]);
        $newNopol ="";
        if($request->has('no_pol')){
            $newNopol = $request->no_pol;
        }
        $kendaraan = Kendaraan::findorfail($no_pol);
        
            $kendaraan->no_pol = $newNopol;
            $kendaraan->nama_pemilik = $request->nama_pemilik;
            $kendaraan->alamat = $request->alamat;
            $kendaraan->merk = $request->merk;
            $kendaraan->tipe = $request->tipe;
            $kendaraan->jenis = $request->jenis;
            $kendaraan->model = $request->model;
            $kendaraan->tahun_pembuatan = $request->tahun_pembuatan;
            $kendaraan->daya_listrik = $request->daya_listrik;
            $kendaraan->no_rangka = $request->no_rangka;
            $kendaraan->no_mesin = $request->no_mesin;
            $kendaraan->warna = $request->warna;
            $kendaraan->status_kendaraan =$request->status_kendaraan;
            $kendaraan->tahun_registrasi = $request->tahun_registrasi;
            $kendaraan->no_bpkb = $request->no_bpkb;
            $kendaraan->harga_beli = $request->harga_beli;
            $kendaraan->tanggal_masuk = $request->tanggal_masuk;
            $kendaraan->supplier = $request->supplier;
            $kendaraan->keterangan = $request->keterangan;
            $kendaraan->save();
        return redirect()->route('kendaraan.index')->with('success','Data Kendaraan anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_pol)
    {
        Kendaraan::findorfail($no_pol)->delete();
        return redirect()->route('kendaraan.index')->with('success','Data Kendaraan anda berhasil dihapus');
    }
   
}
