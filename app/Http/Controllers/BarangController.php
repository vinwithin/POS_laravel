<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tambah/index',[
            'barangs' => barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {
        $request->validate([
            'barang' => 'required',
            'kode' => 'required',
            'harga' => 'required',
        ]);

        $barang = [
            'nama_barang' => $request->input('barang'),
            'kode_barang' => $request->input("kode"),
            'harga' => $request->input("harga"),
            'user_id' => auth()->user()->id,
        ];
         barang::create($barang);
        
          return redirect('manage')->withSuccess('Berhasil Ditambah!');
           
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = barang::where('id',$id)->get();
	    return view('edit/index',['barangs' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang' => 'required',
            'kode' => 'required',
            'harga' => 'required',
        ]);
        $barang = barang::where('id', $id)->update([
            'nama_barang' => $request->barang,
            'kode_barang' => $request->kode,
            'harga' => $request->harga,
            
        ]);
        //$produk->save();
       if($barang == true){
            return redirect('manage')->withSuccess('Berhasil DiEdit!');
       }else{
        return  redirect('manage')->withErrors("Mohon isi Semua Field");
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        barang::where('id', $id)->delete(); 
        return redirect('manage')->withSuccess('Berhasil Dihapus!');
    }
}
