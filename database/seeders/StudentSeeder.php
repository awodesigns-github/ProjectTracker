<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Cohort;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student seeder
        Student::factory()->create([
            'registration_number' => 'CS-100-1',
            'github_username' => 'awodesigns-github',
            'user_id' => 4,
            'cohort_id' => 1,
            'campus_id' => 1,
            'course_id' => 1,
            'team_id' => 1
        ]);

        Student::factory()->create([
            'registration_number' => 'CS-101-1',
            'github_username' => 'octocat',
            'user_id' => 5,
            'cohort_id' => 1,
            'campus_id' => 1,
            'course_id' => 1,
            'team_id' => 1
        ]);
    }
}
