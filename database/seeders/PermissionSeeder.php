<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        Permission::firstOrCreate([
            'name' => 'create project'
        ]);

        Permission::firstOrCreate([
            'name' => 'create task'
        ]);

        Permission::firstOrCreate([
            'name' => 'read project'
        ]);
        
        Permission::firstOrCreate([
            'name' =>'read task'
        ]);

        Permission::firstOrCreate([
            'name' => 'edit project'
        ]);

        Permission::firstOrCreate([
            'name' => 'edit task'
        ]);

        Permission::firstOrCreate([
            'name' => 'delete project'
        ]);

        Permission::firstOrCreate([
            'name' => 'delete task'
        ]);

        Permission::firstOrCreate([
            'name' => 'track progress'
        ]);

        /**
         * assign permissions to roles
         */

         // assign persmissions to instructors
         $instructor = Role::where('name', 'instructor')->first();
         $instructor->givePermissionTo([
            'create project',
            'read project',
            'edit project',
            'delete project',
            'create task',
            'read task',
            'edit task',
            'delete task',
            'track progress'
         ]);

         // assign permissions to team leader
         $teamLeader = Role::where('name', 'team leader')->first();
         $teamLeader->givePermissionTo([
            'read project',
            'read task',
            'track progress'
        ]);

        // assign permissions to team member
        $teamMember = Role::where('name', 'team member')->first();
        $teamMember->givePermissionTo([
           'read project',
           'read task',
        ]);
    }
}
