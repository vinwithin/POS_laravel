<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\transaksi;
use Illuminate\Http\Request;

class trasactionController extends Controller
{
    protected $rules = [
        'barang_id' => 'required|unique|transaksi',
    ];
    public function index(){
        return view('transaksi/index',[
            'barangs' => barang::all(),
            'transaksis' => transaksi::get()
        ]);
    }
    public function submit(Request $request){
        $request->validate([
            'barang_id' => 'required|unique',
        ]);
        $transaction = transaksi::create([
            'barang_id' => $request->barangs,
            'qty' => 1,
           'total' => "",
        ]);
        $transaction->total = $transaction->barang->harga;
        $transaction->save();
        return redirect('transaksi');
    }
    
}
