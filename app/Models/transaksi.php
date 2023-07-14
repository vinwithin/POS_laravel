<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'barang_id',
        'qty',
        'harga',
    ];
    public function barang(){
        return $this->belongsTo('App\Models\barang', 'barang_id');
    }
}
