<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\InstructorStudent;
use App\Models\Module;
use App\Models\ModuleStudent;
use App\Models\ProjectInstructor;
use App\Models\Student;
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

        $admin = User::factory()->create([
            'name' => 'Joseph Mushi',
            'email' => 'test0@example.com',
            'date_of_birth' => '2000-01-01',
            'nationality' => 'Tanzanian',
            'marital_status' => 'single',
            'home_address' => 'Arusha, Tanzania',
            'primary_phone_number' => '0712345678',
            'secondary_phone_number' => '0712345678',
            'emergency_contact_name' => 'Claretha',
            'emergency_contact_phone_number' => '0712345678',
            'emergency_contact_relationship' => 'Mother',
        ]);

        $instructorOne = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test1@example.com',
            'date_of_birth' => '2000-03-01',
            'nationality' => 'American',
            'marital_status' => 'Married',
            'home_address' => 'Washington DC, America',
            'primary_phone_number' => '0712345678',
            'secondary_phone_number' => '0712345678',
            'emergency_contact_name' => 'Jane',
            'emergency_contact_phone_number' => '0712345678',
            'emergency_contact_relationship' => 'Mother',
        ]);

        $instructorTwo = User::factory()->create([
            'name' => 'Jack Odinga',
            'email' => 'test2@example.com',
            'date_of_birth' => '2000-02-01',
            'nationality' => 'Kenyan',
            'marital_status' => 'single',
            'home_address' => 'Arusha, Tanzania',
            'primary_phone_number' => '0712345678',
            'secondary_phone_number' => '0712345678',
            'emergency_contact_name' => 'Claretha',
            'emergency_contact_phone_number' => '0712345678',
            'emergency_contact_relationship' => 'Mother',
        ]);

        $studentOne = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'test3@example.com',
            'date_of_birth' => '2000-04-01',
            'nationality' => 'Tanzanian',
            'marital_status' => 'single',
            'home_address' => 'Arusha, Tanzania',
            'primary_phone_number' => '0712345678',
            'secondary_phone_number' => '0712345678',
            'emergency_contact_name' => 'Claretha',
            'emergency_contact_phone_number' => '0712345678',
            'emergency_contact_relationship' => 'Mother',
        ]);

        $instructorTwo = User::factory()->create([
            'name' => 'Job Doe',
            'email' => 'test4@example.com',
            'date_of_birth' => '2000-05-01',
            'nationality' => 'Ugandan',
            'marital_status' => 'Married',
            'home_address' => 'Kampala, Uganda',
            'primary_phone_number' => '0712345678',
            'secondary_phone_number' => '0712345678',
            'emergency_contact_name' => 'Robert',
            'emergency_contact_phone_number' => '0712345678',
            'emergency_contact_relationship' => 'Father',
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
        $this->call(ProjectInstructorSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(InstructorStudentSeeder::class);
        $this->call(InstructorModuleSeeder::class);
    }
}
