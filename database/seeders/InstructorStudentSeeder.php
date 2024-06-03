<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Instructor;
use App\Models\Student;

class InstructorStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $instructors = Instructor::all();
        $students = Student::all();

        foreach ($instructors as $instructor) {
            $studentCount = $faker->numberBetween(1, 2);
            $instructor->student()->attach(
                $students->random($studentCount)->pluck('id')
            );
        }
    }
}