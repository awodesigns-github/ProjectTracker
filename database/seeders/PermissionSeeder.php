<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        Permission::create([
            'name' => 'create project'
        ]);

        Permission::create([
            'name' => 'create task'
        ]);

        Permission::create([
            'name' => 'view project'
        ]);

        Permission::create([
            'name' => 'view task'
        ]);

        Permission::create([
            'name' => 'edit project'
        ]);

        Permission::create([
            'name' => 'edit task'
        ]);

        Permission::create([
            'name' => 'delete project'
        ]);

        Permission::create([
            'name' => 'delete task'
        ]);
        
    }
}
