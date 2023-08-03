<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Seeder
        $adminUser = User::create([
            'username' => 'admindiskominfo', 
            'email' => 'admin@diskominfo.com',
            'password' => 'password',
            'role' => 'Admin'
        ]);

        $adminRole = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permissions);
        $adminUser->assignRole([$adminRole->id]);

        // Kecamatan Seeder
        $kecamatanUser = User::create([
            'username' => 'adminkecamatan', 
            'email' => 'admin@kecamatan.com',
            'password' => 'password',
            'role' => 'Kecamatan'
        ]);

        $kecamatanRole = Role::create(['name' => 'Kecamatan']);
        // Sesuaikan dengan permissions yang diperlukan oleh user Kecamatan
        // Contoh: $kecamatanRole->givePermissionTo('permission_name');
        $kecamatanRole->givePermissionTo('map-list');
        $kecamatanRole->givePermissionTo('map-create');
        $kecamatanRole->givePermissionTo('map-edit');
        $kecamatanRole->givePermissionTo('map-delete');
        $kecamatanUser->assignRole([$kecamatanRole->id]);

        // Desa Seeder
        $desaUser = User::create([
            'username' => 'admindesa', 
            'email' => 'admin@desa.com',
            'password' => 'password',
            'role' => 'Desa'
        ]);

        $desaRole = Role::create(['name' => 'Desa']);
        // Sesuaikan dengan permissions yang diperlukan oleh user Desa
        // Contoh: $desaRole->givePermissionTo('permission_name');
        $desaRole->givePermissionTo('poverty-list');
        $desaRole->givePermissionTo('poverty-create');
        $desaRole->givePermissionTo('poverty-edit');
        $desaRole->givePermissionTo('poverty-delete');
        $desaUser->assignRole([$desaRole->id]);
    }

}