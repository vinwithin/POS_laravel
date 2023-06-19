<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
        'nama_barang' => 'Lampu',
        'kode_barang' => '1',
        'harga' => '14',
        'user_id' => 2,
        ]);
        
    }
}
