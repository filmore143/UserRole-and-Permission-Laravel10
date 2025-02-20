<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-show']);
        Permission::create(['name' => 'role-update']);
        Permission::create(['name' => 'role-delete']);

        Permission::create(['name' => 'permission-list']);
        Permission::create(['name' => 'permission-create']);
        Permission::create(['name' => 'permission-show']);
        Permission::create(['name' => 'permission-update']);
        Permission::create(['name' => 'permission-delete']);


        Permission::create(['name' => 'user-list']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-show']);
        Permission::create(['name' => 'user-update']);
        Permission::create(['name' => 'user-delete']);


        // Permission::create(['name' => 'role-list']);
        // Permission::create(['name' => 'role-create']);
        // Permission::create(['name' => 'role-show']);
        // Permission::create(['name' => 'role-update']);
        // Permission::create(['name' => 'role-delete']);


        $superAdmin = Role::create(['name'=> 'Super Admin']) ->syncPermissions(Permission::all());
        $admin = Role::create(['name'=> 'Admin']) ->syncPermissions('user-list', 'user-create', 'user-show', 'user-update', 'user-delete');
        $visitor = Role::create(['name'=> 'Visitor']) ->syncPermissions('user-list');
        $noRoles = Role::create(['name'=> 'Unknown User']) ->syncPermissions('user-list');
    }
}
