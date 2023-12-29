<?php

namespace App\Http\Controllers;
use App\Models\barang;
use App\Models\riwayat;
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
      
        $transaction = transaksi::create([
            'barang_id' => $request->barangs,
            'qty' => 1,
            'total' => ' '
        ]);
        $transaction->total = $transaction->barang->harga;
        $transaction->save();
        return redirect('transaksi');
    
    
        
        
    
    }
    public function update(Request $request){
        riwayat::create([
            "nama_kasir" => auth()->user()->name,
            "qty" => $request->qtyjumlah,
            "total" => $request->totals,
        ]);
        return redirect('transaksi')->withSuccess('Berhasil Dipesan!');
    }
    
    
    public function destroy(string $id)
    {
        transaksi::where('id', $id)->delete(); 
        
        
       
        return redirect('transaksi');


    }
    public function cetak(Request $request){
        transaksi::query()->delete();
      
        return redirect('transaksi')->withSuccess('Berhasil Dihapus!');
    }
    
}
