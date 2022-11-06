<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = DB::table('pelanggan');
        $pelanggan->select('pelanggan.*')
        ->orderBy('pelanggan.nama', 'asc');
        $pelanggan = $pelanggan->get();
        return view('pelanggan.index', compact('pelanggan'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'nik' => 'required|unique:pelanggan',
            'nama' => 'required',
            'nomor_hp' => 'required|numeric',
            'alamat' => 'required',
        ]);
       
        
    
        $newName="";
       if($request->file('foto_ktp')){
            $extension = $request->file('foto_ktp')->getClientOriginalExtension();
            $newName = $request->nama.'.'.$extension;
            $request->file('foto_ktp')->storeAs('foto_ktp',$newName);
       }
        $newName2="";
       if($request->file('foto_ktp2')){
            $extension = $request->file('foto_ktp2')->getClientOriginalExtension();
            $newName2 = $request->nama.'2'.'.'.$extension;
            $request->file('foto_ktp2')->storeAs('foto_ktp2',$newName2);
       }
       
     
       $pelanggan = Pelanggan::create([
        'nik' => $request->nik,
        'nama' =>  $request->nama,
        'foto_ktp' => $newName,
        'foto_ktp2' => $newName2,
        'nomor_hp' => $request->nomor_hp,
        'alamat' => $request->alamat,
    ]);
    return redirect('/pelanggan')->with('success','data berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findorfail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }
    public function ubah($id)
    {
        $pelanggan = Pelanggan::findorfail($id);
        return view('pelanggan.update', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate= $request->validate([
            'foto_ktp' => 'mimes:jpg,png,jpeg|image',
            'foto_ktp2' => 'mimes:jpg,png,jpeg|image',
            'nomor_hp' => 'required|numeric',
        ]);
        $pelanggan = Pelanggan::findorfail($id);
       
       if($request->has('foto_ktp')){
            $extension = $request->file('foto_ktp')->getClientOriginalExtension();
            $newName = $request->nama.'.'.$extension;
            $request->file('foto_ktp')->storeAs('foto_ktp',$newName);
            $pelanggan->foto_ktp = $newName;
       }
       $namaFoto = $pelanggan->foto_ktp;
       
       if($namaFoto != null || $namaFoto != ''){
        Storage::delete($namaFoto);
       }

       if($request->has('foto_ktp2')){
            $extension = $request->file('foto_ktp2')->getClientOriginalExtension();
            $newName2 = $request->nama.'2'.'.'.$extension;
            $request->file('foto_ktp2')->storeAs('foto_ktp2',$newName2);
            $pelanggan->foto_ktp2 = $newName2;
       }
       $namaFoto2 = $pelanggan->foto_ktp2;
       
       if($namaFoto2 != null || $namaFoto2 != ''){
        Storage::delete($namaFoto2);
       }

       $pelanggan->nik =$request->nik;
       $pelanggan->nama=$request->nama;
       $pelanggan->nomor_hp = $request->nomor_hp;
       $pelanggan->alamat = $request->alamat;
       $pelanggan->save();
  
        return redirect()->route('pelanggan.index')->with('success','Data pelanggan anda berhasil diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
