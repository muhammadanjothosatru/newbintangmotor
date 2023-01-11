<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index(){
        //$item = Item::all();
        //dd($newitems);
        return view('landing.admin.carousel.index'); 
    
    }

    public function create(){

        return view('landing.admin.carousel.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'namapromo' => 'required|unique:carousel',
            'linkpromo' => 'required',
            'foto' => 'required'
        ]);

        $num = rand(1, 100);
        $basenamefile = str_replace(' ', '_', $request->namapromo);

        $newName = "";
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $basenamefile . '&upd=' . $num . '.' . $extension;
            $request->file('foto')->storeAs('foto_carousel', $newName);
        }

        $carousel = Carousel::create([
            'namapromo' => $request->namapromo,
            'linkpromo' => $request->linkpromo,
            'foto' => $newName,
        ]);
        return redirect('/carousel')->with('success', 'data berhasil ditambahkan');

    }

    public function edit($id)
    {
        $promo = Carousel::findorfail($id);
        return view('landing.admin.carousel.edit', compact('promo'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'namapromo' => 'required',
            'linkpromo' => 'required',
        ]);

        $num = rand(1, 100);
        $carousel = Carousel::findorfail($id);
        $namafoto = $carousel->foto;
        $basenamefile = str_replace(' ', '_', $request->namapromo);
        
        if ($request->hasFile('foto')) {
            Storage::delete('foto_carousel/' .$namafoto);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $basenamefile . '&upd=' . $num . '.' . $extension;
            $request->file('foto')->storeAs('foto_carousel', $newName);
            $carousel->foto = $newName;
        }

        $carousel->namapromo = $request->namapromo;
        $carousel->linkpromo = $request->linkpromo;
        $carousel->save();

        return redirect('/carousel')->with('success', 'Data promo anda berhasil diupdate');
    }


    public function destroy(Request $request, $id){
        $carousel = Carousel::findorfail($id);
        $carousel->delete();
        return redirect('/carousel')->with('success','Promo anda berhasil dihapus');
    }
}
