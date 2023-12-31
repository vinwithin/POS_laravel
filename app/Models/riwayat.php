<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = 'riwayat';
    protected $filiable =[
     "total_pembayaran"
    ];
    protected $guarded = ['id','created_at','upadated_at'];
    public function transaksi(){
        return $this->belongsTo('App\Models\transaksi', 'transaksi_id');
    }
}
