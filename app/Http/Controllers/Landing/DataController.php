<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index()
    {
        //$item = Item::all();
        //dd($newitems);
        return view('landing.admin.data.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $kendaraan = DB::table('kendaraan');
        $foto = DB::table('foto_landing')->pluck('no_pol');

        if (Auth::user()->role == 0) {
            $kendaraan->where('status_kendaraan', '=', 'Tersedia')
                ->whereNotIn('no_pol', $foto)
                ->select('*');
        }
        $allkendaraan = $kendaraan->get();

        return view('landing.admin.data.create', compact('allkendaraan'));
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
            'no_pol' => 'required',
            'deskripsi' => 'required',
            'harga_jual' => 'required',
            'kilometer' => 'required',
            'dp' => 'required',
            'angsuran' => 'required',
            'bulan' => 'required',
            'foto' => 'required',
        ]);

        $num = rand(1, 100);
        $basenamefile = str_replace(' ', '_', $request->no_pol);

        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $n = 1;
            $fotos = array();
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $newName = $basenamefile . '_' . $n . '&upd=' . $num . '.' . $extension;
                $file->storeAs('foto_kendaraan', $newName);
                array_push($fotos, $newName);
                $n = $n + 1;
            }
            $fotodb = implode(";", $fotos);
        }

        $item = Item::create([
            'no_pol' => $request->no_pol,
            'foto' => $fotodb,
            'harga_jual' => preg_replace('/[^0-9]/', '', $request->harga_jual),
            'deskripsi' => $request->deskripsi,
            'kilometer' => $request->kilometer,
            'dp' => $request->dp,
            'angsuran' => preg_replace('/[^0-9]/', '', $request->angsuran),
            'bulan' => $request->bulan,
        ]);
        return redirect('/datamanagement')->with('success', 'data berhasil ditambahkan');

    }

    public function detail($id)
    {

        $itemjual = DB::table('foto_landing')
            ->join('kendaraan', 'kendaraan.no_pol', '=', 'foto_landing.no_pol')
            ->select('foto_landing.id', 'kendaraan.jenis', 'kendaraan.no_pol', DB::Raw("CONCAT(merk, ' ' , tipe, ' ', tahun_pembuatan) AS judul"), 'harga_jual', 'foto', 'deskripsi', 'kilometer', 'dp', 'bulan', 'angsuran')
            ->where('foto_landing.id', $id);
        $items = $itemjual->get();

        $rowcount = DB::table('foto_landing')
            ->where('foto_landing.id', $id)
            ->selectRaw("LENGTH(deskripsi) - LENGTH(REPLACE(deskripsi, '\n', '')) as baris")->get();

        $newitems = new Collection();
        foreach ($items as $key) {
            $fotos = explode(";", $key->foto);

            $newitems->push((object) [
                "id" => $key->id,
                "judul" => $key->judul,
                "kilometer" => $key->kilometer,
                "foto" => $fotos,
                "harga_jual" => $key->harga_jual,
                "deskripsi" => $key->deskripsi,
                "dp" => $key->dp,
                "angsuran" => $key->angsuran,
                "bulan" => $key->bulan,
            ]);
        };
        return view('landing.admin.data.detail', compact('newitems', 'rowcount'));
    }

    public function edit($id)
    {

        $itemjual = DB::table('foto_landing')
            ->join('kendaraan', 'kendaraan.no_pol', '=', 'foto_landing.no_pol')
            ->select('foto_landing.id', 'kendaraan.jenis', 'kendaraan.no_pol', DB::Raw("CONCAT(merk, ' ' , tipe, ' ', tahun_pembuatan) AS judul"), 'harga_jual', 'foto', 'deskripsi', 'kilometer', 'dp', 'bulan', 'angsuran')
            ->where('foto_landing.id', $id);
        $items = $itemjual->get();

        $rowcount = DB::table('foto_landing')
            ->where('foto_landing.id', $id)
            ->selectRaw("LENGTH(deskripsi) - LENGTH(REPLACE(deskripsi, '\n', '')) as baris")->get();

        $newitems = new Collection();
        foreach ($items as $key) {
            $fotos = explode(";", $key->foto);

            $newitems->push((object) [
                "id" => $key->id,
                "judul" => $key->judul,
                "kilometer" => $key->kilometer,
                "foto" => $fotos,
                "harga_jual" => $key->harga_jual,
                "deskripsi" => $key->deskripsi,
                "dp" => $key->dp,
                "angsuran" => $key->angsuran,
                "bulan" => $key->bulan,
            ]);
        };
        return view('landing.admin.data.edit', compact('newitems', 'rowcount'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'deskripsi' => 'required',
            'harga_jual' => 'required',
            'kilometer' => 'required',
            'dp' => 'required',
            'angsuran' => 'required',
            'bulan' => 'required'
        ]);

        $num = rand(1, 100);
        
        $item = Item::findorfail($id);
        $namaFoto = $item->foto;
        $basenamefile = str_replace(' ', '_', $item->no_pol);
        
        if ($request->hasFile('foto')) {
            $pastfiles = explode(";", $item->foto);
            foreach ($pastfiles as $file) {
                Storage::delete('foto_kendaraan/' .$file);
            }
            $files = $request->file('foto');
            $n = 1;
            $fotos = array();
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $newName = $basenamefile . '_' . $n . '&upd=' . $num . '.' . $extension;
                $file->storeAs('foto_kendaraan', $newName);
                array_push($fotos, $newName);
                $n = $n + 1;
            }
            $fotodb = implode(";", $fotos);
            $item->foto = $fotodb;
        }

        $item->deskripsi = $request->deskripsi;
        $item->harga_jual = preg_replace('/[^0-9]/', '', $request->harga_jual);
        $item->deskripsi = $request->deskripsi;
        $item->kilometer = $request->kilometer;
        $item->dp = $request->dp;
        $item->angsuran = preg_replace('/[^0-9]/', '', $request->angsuran);
        $item->bulan = $request->bulan;
        $item->save();

        return redirect('/datamanagement')->with('success', 'Data item anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findorfail($id);
        $item->delete();
        return redirect('/datamanagement')->with('success','Data Kendaraan anda berhasil dihapus');
    }
}
