<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);
        $permission = Permission::create(['name' => "read produk"]);
        $permission = Permission::create(['name' => "update produk"]);
        $permission = Permission::create(['name' => "input produk"]);
        $permission = Permission::create(['name' => "delete produk"]);
        $permission = Permission::create(['name' => "transaksi produk"]);

        $admin->givePermissionTo('read produk');
        $admin->givePermissionTo('update produk');
        $admin->givePermissionTo('delete produk');
        $admin->givePermissionTo('input produk');
        $admin->givePermissionTo('transaksi produk');
        
        $user->givePermissionTo('read produk');
        $user->givePermissionTo('transaksi produk');
    }
}
