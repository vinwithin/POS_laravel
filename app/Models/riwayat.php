<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = 'riwayat';
    protected $filiable =[
     'nama_barang',
     'qty', 
     'total'
    ];
    protected $guarded = ['id','created_at','upadated_at'];
    public function transaksi(){
        return $this->belongsTo('App\Models\transaksi', 'transaksi_id');
    }
}
