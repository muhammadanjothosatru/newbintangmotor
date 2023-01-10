<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        ]);
        return redirect('/datamanagement')->with('success', 'data berhasil ditambahkan');

    }
}
