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


        // instructor permissions
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

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 9
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 10
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 11
        ]);

        RolePermission::create([
            'role_id' => 2,
            'permission_id' => 12
        ]);

        // Student Permissions
        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 21
        ]);

        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 22
        ]);

        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 23
        ]);

        RolePermission::create([
            'role_id' => 3,
            'permission_id' => 24
        ]);
    }
}
