<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = 'transaksi';
    protected $filiable = ['id'];
    public function transaksi(){
        return $this->belongsTo('App\Models\transaksi', 'transaksi_id');
    }
}
