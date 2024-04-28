<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create roles with permissions
        // admin permissions
        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 1
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 2
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 3
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 4
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 5
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 6
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 7
        ]);

        RolePermission::create([
            'role_id' => 1,
            'permission_id' => 8
        ]);

        // instructor permissions
        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 1
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 2
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 3
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 4
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 5
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 6
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 7
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 8
        ]);

        // Team leader permissions
        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 3
        ]);

        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 4
        ]);

        // Team member permissions
        RolePermission::create([
            'role_id' => 4,
            'permission_id' => 3
        ]);

        RolePermission::create([
            'role_id' => 4,
            'permission_id' => 4
        ]);

        // student permissions
        RolePermission::create([
            'role_id' => 5,
            'permission_id' => 3
        ]);

        RolePermission::create([
            'role_id' => 5,
            'permission_id' => 4
        ]);

    }
}
