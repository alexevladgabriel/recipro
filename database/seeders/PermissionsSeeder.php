<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'comments.create']);
        Permission::create(['name' => 'comments.edit']);
        Permission::create(['name' => 'comments.delete']);

        $admin_general = Role::create(['name' => 'admin.general']);

        $admin_judet = Role::create(['name' => 'admin.judet']);
        $mod_judet = Role::create(['name' => 'mod.judet']);

        $admin_localitate = Role::create(['name' => 'admin.localitate']);
        $mod_localitate = Role::create(['name' => 'mod.localitate']);

        $admin_comuna = Role::create(['name' => 'admin.comuna']);
        $mod_comuna = Role::create(['name' => 'mod.comuna']);

        $user = Role::create(['name' => 'user']);

        $admin = \App\Models\User::create([
            'first_name' => 'Alexe',
            'last_name' => 'Vlad',
            'gender' => 'Male',
            'address' => 'Str. Lacului, Nr. 3',
            'email' => 'alexevladgabriel@gmail.com',
            'password' => Hash::make('Alex2003'),
            'verified' => false,
            'root_admin' => true,
        ]);

        $admin->assignRole($admin_general);
    }
}
