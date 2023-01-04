<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    //
    public function index(){
        //$item = Item::all();
        $itemjual =DB::table('foto_landing')
                ->join('kendaraan','kendaraan.no_pol', '=', 'foto_landing.no_pol');
                
                
        $item = $itemjual->get();
        dd($item);
        return view('landing.landing.index',compact('item')); 
    }
}
