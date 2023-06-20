<?php

namespace App\Http\Controllers;
use App\Models\barang;

use App\Models\transaksi;
use Exception;
use Illuminate\Http\Request;

class trasactionController extends Controller
{
    public function index(){
        return view('transaksi/index',[
            'barangs' => barang::all(),
            'transaksis' => transaksi::get()
        ]);
    }
    public function submit(Request $request){
        $request->validate([
            'barang_id' => 'unique:transaksi',
        ]);
      try{
        $transaction = transaksi::create([
            'barang_id' => $request->barangs,
            'qty' => 1,
           'total' => "",
        ]);
        $transaction->total = $transaction->barang->harga;
        $transaction->save();
        return redirect('transaksi');
    }catch(Exception $e){
        return redirect("transaksi")->witherrors("Tidak bisa menginputkan barang yang sama");
    }
        
    
    }
    public function destroy(string $id)
    {
        transaksi::where('id', $id)->delete(); 
        return redirect('transaksi');

    }
    
}
