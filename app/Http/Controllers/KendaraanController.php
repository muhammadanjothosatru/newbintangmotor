<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KendaraanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function mobil()
    {
        $kendaraanmobil =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id');
            
                if (Auth::user()->role == 2) {
                    $kendaraanmobil->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->select('kendaraan.*');
                }
                if (Auth::user()->role == 0) {
                $kendaraanmobil->where('kendaraan.jenis', '=', 'Mobil')
                                ->select('kendaraan.*');
                }
                $allkendaraan=$kendaraanmobil->get();
                return view('kendaraan.mobil',compact('allkendaraan'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        self::changestatus();
        $kendaraan = Kendaraan::all();
        $kendaraanmotor =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id');
             
                if (Auth::user()->role == 1) {
                    $kendaraanmotor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->select('kendaraan.*')
                                ->orderBy('kendaraan.created_at', 'desc');
                }
                if (Auth::user()->role == 2) {
                    $kendaraanmotor->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->select('kendaraan.*')
                                ->orderBy('kendaraan.created_at', 'desc');
                }
                if (Auth::user()->role == 0) {
                $kendaraanmotor->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->select('kendaraan.*')
                                ->orderBy('kendaraan.created_at', 'desc');
                }
                $allkendaraan=$kendaraanmotor->get();
                return view('kendaraan.index',compact('kendaraan','allkendaraan')); 
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $kendaraanmotor =DB::table('merk');
        if (Auth::user()->role == 1) {
            $kendaraanmotor->where('merk.jenis', '=', 'Sepeda Motor')
                        ->select('merk.*')
                        ->orderBy('merk.created_at', 'desc');
        }
        if (Auth::user()->role == 2) {
            $kendaraanmotor->where('merk.jenis', '=', 'Mobil')
                        ->select('merk.*')
                        ->orderBy('merk.created_at', 'desc');
        }
        if (Auth::user()->role == 0) {
        $kendaraanmotor->select('merk.*')
                        ->orderBy('merk.jenis', 'asc')
                        ->orderBy('merk.created_at', 'desc');
        }
        $allkendaraan=$kendaraanmotor->get();

        return view('kendaraan.create',compact('allkendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= array(
            'no_pol' => 'required|unique:kendaraan',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'jenis' => 'required',
            'model' => 'required',
            'tahun_pembuatan' => 'required|numeric',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            'tahun_registrasi' => 'required',
            'no_bpkb' => 'required',
            'harga_beli' => 'required',
            'tanggal_masuk' => 'required',
        );
        
        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails())
        {
            return back()->withInput()->withErrors(['no_pol'=>'No.Pol Kendaraan Sudah Terdaftar']);
        } else {
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
                'daya_listrik' => '0',
                'no_rangka' => $request->no_rangka,
                'no_mesin' => $request->no_mesin,
                'warna' => $request->warna,
                'status_kendaraan' =>"Tersedia",
                'tahun_registrasi' => $request->tahun_registrasi,
                'no_bpkb' => $request->no_bpkb,
                'harga_beli' =>  preg_replace('/[^0-9]/', '', $request->harga_beli),
                'tanggal_masuk' => $request->tanggal_masuk,
                'supplier' => $request->supplier,
                'keterangan' => $request->keterangan,
            ]);
        }
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
        
        $kendaraanmotor =DB::table('merk');
        if (Auth::user()->role == 1) {
            $kendaraanmotor->where('merk.jenis', '=', 'Sepeda Motor')
                        ->select('merk.*')
                        ->orderBy('merk.created_at', 'desc');
        }
        if (Auth::user()->role == 2) {
            $kendaraanmotor->where('merk.jenis', '=', 'Mobil')
                        ->select('merk.*')
                        ->orderBy('merk.created_at', 'desc');
        }
        if (Auth::user()->role == 0) {
        $kendaraanmotor
                        ->select('merk.*')
                        ->orderBy('merk.jenis', 'asc')
                        ->orderBy('merk.created_at', 'desc');
        }
        $allkendaraan=$kendaraanmotor->get();
      

        return view('kendaraan.edit', compact('kendaraan', 'allkendaraan'));
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
                    $kendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.status_kendaraan', '=', 'Tersedia')
                                ->select('kendaraan.*');
                }
                $kendaraanterjual=$kendaraan->get();
        
        foreach ($kendaraanterjual as $terjual) {
            Kendaraan::where('no_pol', '=', $terjual->no_pol)->update(['status_kendaraan'=>'Terjual']);
        }
    }

    
    function updateData($request, $kendaraan)
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
            'no_rangka' => 'required',
            'no_mesin' => 'required',
            'warna' => 'required',
            'tahun_registrasi' => 'required',
            'status_kendaraan' => 'required',
            'no_bpkb' => 'required',
            'harga_beli' => 'required',
            'tanggal_masuk' => 'required',
        
        ]);
        $kendaraan->no_pol = strtoupper($request->no_pol);
        $kendaraan->nama_pemilik = $request->nama_pemilik;
        $kendaraan->alamat = $request->alamat;
        $kendaraan->merk = $request->merk;
        $kendaraan->tipe = $request->tipe;
        $kendaraan->jenis = $request->jenis;
        $kendaraan->model = $request->model;
        $kendaraan->tahun_pembuatan = $request->tahun_pembuatan;
        $kendaraan->daya_listrik = '0';
        $kendaraan->no_rangka = $request->no_rangka;
        $kendaraan->no_mesin = $request->no_mesin;
        $kendaraan->warna = $request->warna;
        $kendaraan->status_kendaraan =$request->status_kendaraan;
        $kendaraan->tahun_registrasi = $request->tahun_registrasi;
        $kendaraan->no_bpkb = $request->no_bpkb;
        $kendaraan->harga_beli = intval(preg_replace('/[^0-9]/', '', $request->harga_beli))+intval(preg_replace('/[^0-9]/', '', $request->biaya_tambahan));
        $kendaraan->tanggal_masuk = $request->tanggal_masuk;
        $kendaraan->supplier = $request->supplier;
        $kendaraan->keterangan = $request->keterangan;
        $kendaraan->save();
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

        $kendaraan = Kendaraan::findorfail($no_pol);
        try{
            $kendaraan2 = Kendaraan::findorfail($request['no_pol']);
            if($request['no_pol'] == $kendaraan->no_pol){
                self::updateData($request, $kendaraan);
                return redirect()->route('kendaraan.index')->with('success','Data Kendaraan anda berhasil diupdate');
            } else {
                return back()->withErrors(['no_pol'=>'No.Pol Kendaraan Sudah Terdaftar']);
            };
        } catch (ModelNotFoundException $e){
            self::updateData($request, $kendaraan);
            return redirect()->route('kendaraan.index')->with('success','Data Kendaraan anda berhasil diupdate');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_pol)
    {
        $kendaraan = Kendaraan::findorfail($no_pol);
        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success','Data Kendaraan anda berhasil dihapus');
    }
  
}
