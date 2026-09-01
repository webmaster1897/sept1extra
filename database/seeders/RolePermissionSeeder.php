<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $guard = 'web';

        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => $guard,
            ]);
        }

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => $guard,
        ]);

        $admin->givePermissionTo(Permission::where('guard_name', $guard)->get());

        $dealer = Role::firstOrCreate([
            'name' => 'dealer',
            'guard_name' => $guard,
        ]);

        $dealer->givePermissionTo([
            'view users',
            'edit users',
        ]);
    }
}
