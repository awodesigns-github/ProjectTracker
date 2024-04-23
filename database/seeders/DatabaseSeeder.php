<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Joseph Mushi',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Jack Smith',
            'email' => 'test2@example.com'
        ]);

        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'test3@example.com'
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test4@example.com'
        ]);

        $this->call(ProjectSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(InstructorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CampusSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(CohortSeeder::class);
        $this->call(CampusCourseSeeder::class);
        $this->call(InstructorCohortSeeder::class);
        $this->call(ModuleStudentSeeder::class);
        $this->call(ModuleTeamSeeder::class);
        $this->call(ProjectTeamSeeder::class);
    }
}
