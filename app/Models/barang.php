<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
    protected $guarded = ['id','created_at','upadated_at'];
    public $barang = 'barang';

    public function User(){
        return $this->belongsTo(User::class);
    }
}
