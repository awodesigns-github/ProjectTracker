<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InstructorCohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // InstructorCohort::factory()->count(25)->create();
        $faker  = Faker::create();

        $instructors = Instructor::all();
        $cohorts = Cohort::all();

        foreach ($instructors as $instructor) {
            $cohortCount = $faker->numberBetween(1, 10);
            $instructor->cohort()->attach(
                $cohorts->random($cohortCount)->pluck('id')
            );
        }
    }
}
