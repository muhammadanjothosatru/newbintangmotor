<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
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
        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $newDate = 
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
            'cabang' =>Auth::user()->cabang,
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
    public function edit(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
    }
}
