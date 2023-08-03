<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'map-list',
            'map-create',
            'map-edit',
            'map-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'population-list',
            'population-create',
            'population-edit',
            'population-delete',
            'poverty-list',
            'poverty-create',
            'poverty-edit',
            'poverty-delete',
            'datamanagement-list',
            'datamanagement-create',
            'datamanagement-edit',
            'datamanagement-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}