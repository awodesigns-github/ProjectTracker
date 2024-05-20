<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);


        // Instructors
        UserRole::create([
            'user_id' => 2,
            'role_id' => 2
        ]);

        UserRole::create([
            'user_id' => 3,
            'role_id' => 2
        ]);


        // Students
        UserRole::create([
            'user_id' => 4,
            'role_id' => 3
        ]);

        UserRole::create([
            'user_id' => 5,
            'role_id' => 3
        ]);
    }
}
