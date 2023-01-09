<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(){
        //$item = Item::all();
        //dd($newitems);
        return view('landing.admin.carousel.index'); 
    
    }
}
