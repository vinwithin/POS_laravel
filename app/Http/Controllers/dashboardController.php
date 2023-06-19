<?php

namespace App\Http\Controllers;
use App\Models\barang;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        return view('awal/index',[
            'barangs' => barang::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
