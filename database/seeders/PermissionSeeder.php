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

        // Roles CRUD -- permissions
        Permission::create([
            'name' => 'add permissions'
        ]);

        Permission::create([
            'name' => 'view permissions'
        ]);
        
        Permission::create([
            'name' => 'edit permissions'
        ]);
        
        Permission::create([
            'name' => 'delete permissions'
        ]);


        // Project & Task permissions -- Instructors
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


        // Resource permissions -- Instructors, Students

        // Global resources
        Permission::create([
            'name' => 'create global resource'
        ]);

        Permission::create([
            'name' => 'view global resource'
        ]);

        Permission::create([
            'name' => 'edit global resource'
        ]);

        Permission::create([
            'name' => 'delete global resource'
        ]);

        // Team resources
        Permission::create([
            'name' => 'create team resource'
        ]);

        Permission::create([
            'name' => 'view team resource'
        ]);

        Permission::create([
            'name' => 'edit team resource'
        ]);

        Permission::create([
            'name' => 'delete team resource'
        ]);

        
        // Team permissions -- Student
        Permission::create([
            'name' => 'create team'
        ]);

        Permission::create([
            'name' => 'view team'
        ]);

        Permission::create([
            'name' => 'edit team'
        ]);

        Permission::create([
            'name' => 'delete team'
        ]);  
    }
}
