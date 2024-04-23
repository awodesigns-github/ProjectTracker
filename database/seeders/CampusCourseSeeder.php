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
        // CampusCourse::factory()->count(25)->create();
        $faker  = Faker::create();

        $courses = Course::all();
        $campuses = Campus::all();

        foreach ($courses as $course) {
            $campusCount = $faker->numberBetween(1, 3);
            $course->campus()->attach(
                $campuses->random($campusCount)->pluck('id')
            );
        }
    }
}
