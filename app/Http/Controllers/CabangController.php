<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::all();
        return view('cabang.index',compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);
        Cabang::create([
            'nama'=>$request->nama,
        ]);
        return redirect('/cabang')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabang = Cabang::findorfail($id);
        return view('cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate= $request->validate([
            'nama' => 'required',
        ]);
        $cabang = Cabang::findorfail($id);
        $cabang->nama = $request->nama;
        $cabang->save();
        return redirect('/cabang')->with('success','data berhasil diedit');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang = Cabang::findorfail($id);
        $cabang->delete();
        return redirect()->route('cabang.index')->with('success','Data user anda berhasil dihapus');
    }
}
