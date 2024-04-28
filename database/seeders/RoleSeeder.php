<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create roles
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'instructor'
        ]);

        Role::create([
            'name' => 'team leader'
        ]);

        Role::create([
            'name' => 'team member'
        ]);

        Role::create([
            'name' => 'student'
        ]);
    }
}
