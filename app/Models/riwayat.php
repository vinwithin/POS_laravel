<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = 'transaksi';
    protected $guarded = ['nama_barang','qty','id','created_at','upadated_at'];
}
