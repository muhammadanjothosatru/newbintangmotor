<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahkendaraan =DB::table('kendaraan')
                ->join('users','kendaraan.users_id', '=', 'users.id');
             
                if (Auth::user()->role == 1) {
                    $jumlahkendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->where('status_kendaraan', '=', 'Tersedia')
                                ->select(DB::raw('count(no_pol) as total_kendaraan'));
                }
                if (Auth::user()->role == 2) {
                    $jumlahkendaraan->where('users.cabang_id', Auth::user()->cabang_id)
                                ->where('kendaraan.jenis', '=', 'Mobil')
                                ->where('status_kendaraan', '=', 'Tersedia')
                                ->select(DB::raw('count(no_pol) as total_kendaraan'));
                }
                if (Auth::user()->role == 0) {
                $jumlahkendaraan->where('kendaraan.jenis', '=', 'Sepeda Motor')
                                ->where('status_kendaraan', '=', 'Tersedia')
                                ->select('no_pol', DB::raw('count(no_pol) as total_kendaraan'));
                }
                $allkendaraan=$jumlahkendaraan->get();
                return view('pages.dashboard',compact('allkendaraan')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
