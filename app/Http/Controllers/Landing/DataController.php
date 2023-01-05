<?php

namespace App\Http\Controllers\Landing;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(){
        //$item = Item::all();
        //dd($newitems);
        return view('landing.admin.data.index'); 
    
    }
}
