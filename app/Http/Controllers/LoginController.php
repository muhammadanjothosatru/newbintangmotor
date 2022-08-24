<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function coba(){
        $user = User::all();
        return view('pages.dashboard', compact('user'));
    }

    public function authenticate(Request $request)
    {
        $credentials= $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/kendaraan');
        }
        return back()->with('login_gagal','Gagal Login');
    }
}

