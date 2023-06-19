<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function Index(){
        return view('login/index');
    }
    function login(Request $request){
        Session::flash('email', $request->email);
        $request-> validate([
            'email' => 'required',
            'password' => 'required',
        ],
    [
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi',
    ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard');
        }else{
            return redirect('login')->witherrors('Email dan Password Salah');
        }
    }
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('sukses');
    }
}
