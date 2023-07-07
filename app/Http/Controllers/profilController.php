<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function index()
    {
        return view('profil/index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = $request->image->getClientOriginalName();
        // $imageExtensi = $request->image->getClientOriginalExtension(); 




        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
                Storage::delete("public/".$request->oldImage);
            }
            $request->image->storeAs('public', $imageName);
        }
        User::where('id', auth()->user()->id)->update([
            'image' => $request->image->storeAs($imageName),
        ]);

        return redirect('profil')->withSuccess('Berhasil Uplaod');
    }
}
