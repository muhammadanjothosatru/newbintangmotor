<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    //
    public function index(){
        //$item = Item::all();
        $itemjual =DB::table('foto_landing')
                ->join('kendaraan','kendaraan.no_pol', '=', 'foto_landing.no_pol');
        $items = $itemjual->get();

        $newitems = new Collection();
        foreach($items as $key){
            $fotos = explode(";", $key->foto);
            
            $newitems->push((object)[
                "id"=>$key->id,
                "no_pol"=>$key->no_pol,
                "foto"=>$fotos,
                "harga_jual"=>$key->harga_jual,
                "deskripsi"=>$key->deskripsi,
                "created_at"=>$key->created_at,
                "updated_at"=>$key->updated_at,
                "users_id"=>$key->users_id,
                "nama_pemilik"=>$key->nama_pemilik,
                "alamat"=>$key->alamat,
                "merk"=>$key->merk,
                "tipe"=>$key->tipe,
                "jenis"=>$key->jenis,
                "model"=>$key->model,
                "tahun_pembuatan"=>$key->tahun_pembuatan,
                "daya_listrik"=>$key->daya_listrik,
                "no_rangka"=>$key->no_rangka,
                "no_mesin"=>$key->no_mesin,
                "warna"=>$key->warna,
                "tahun_registrasi"=>$key->tahun_registrasi,
                "no_bpkb"=>$key->no_bpkb,
                "status_kendaraan"=>$key->status_kendaraan,
                "harga_beli"=>$key->harga_beli,
                "tanggal_masuk"=>$key->tanggal_masuk,
                "supplier"=>$key->supplier,
                "keterangan"=>$key->keterangan
            ]);
        };
        return view('landing.landing.index',compact('newitems')); 
    }
}
