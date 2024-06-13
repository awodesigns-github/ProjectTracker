<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Instructor seeder
        Instructor::factory()->create([
            'employee_id' => 'EMP-100-1',
            'github_username' => 'octocat',
            'user_id' => 2,
            'campus_id' => 1,            
        ]);

        Instructor::factory()->create([
            'employee_id' => 'EMP-101-1',
            'github_username' => 'random',
            'user_id' => 3,
            'campus_id' => 2,            
        ]);
    }
}
