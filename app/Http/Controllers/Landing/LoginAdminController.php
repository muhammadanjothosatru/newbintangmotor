<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index(){
        return view('landing.admin.login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials= $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $role = Auth::user()->role;

            if($role == 0){
                return redirect()->intended('/datamanagement');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('login_gagal','login gagal');
            }
        }

        return back()->with('login_gagal','login gagal');
    }
    public function logout (Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/adminlogin');
    }
}