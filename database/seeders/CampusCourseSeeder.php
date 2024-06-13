<?php

namespace Database\Seeders;

use App\Models\CampusCourse;
use App\Models\Course;
use App\Models\Campus;
use Database\Factories\CampusCourseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CampusCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker  = Faker::create();

        $courses = Course::all();
        $campuses = Campus::all();

        foreach ($courses as $course) {
            $campusCount = 1;
            $course->campus()->attach(
                $campuses->random($campusCount)->pluck('id')
            );
        }
    }
}
