<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    function index(){
        return view('login/sign');
    }
    function register(Request $request){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            
            ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'image' => "profil.png"
        ]);
        $user->save();
        
        $user->assignRole('user');
        
        return redirect()->to('/login')->withSuccess("Berhasil Daftar Akun, Silahkan Login");
    }
}
