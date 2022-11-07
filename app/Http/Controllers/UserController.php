<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('role', 'asc')->get();
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::all();
        return view('user.create', compact('cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'cabang_id' => 'required',
            'password' => 'required',
        ]);
        $password = $request->password;
        $hashedPassword = Hash::make($password);
        $user = User::create([
            'username' => $request->username,
            'email' =>  $request->email,
            'role' => $request->role,
            'cabang_id' => $request->cabang_id,
            'password' => $hashedPassword,
        ]);
        return redirect('/user')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        $cabang = Cabang::findorfail($user->cabang_id);
        $cabangall = Cabang::all();
        return view('user.edit', compact('user','cabang','cabangall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate= $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'cabang_id' => 'required',
            // 'password' => 'required',
        ]);
        // $password = $request->password;
        // $hashedPassword = Hash::make($password);
        $user = User::findorfail($id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->cabang_id = $request->cabang_id;
        
            $user->save();
        return redirect('/user')->with('success','data berhasil ditambahkan');
    }

    public function ubahPassword($id)
    {
        $user = User::findorfail($id);
        return view ('user.ubahPassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_konfirmasi' => 'required|same:password_baru',
      
        ]);
        
        $user = User::find($id);
        if(!Hash::check($request->password_lama, $user->password)){
             return back()->withErrors(["old_pass"=> "Old Password Doesn't match!"]);
        } else {
            $user->password = Hash::make($request->password_baru);
            $user ->save();
            return redirect('/user')->with("success", "Password changed successfully!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','Data user anda berhasil dihapus');
    }
}
