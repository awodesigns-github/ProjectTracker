<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;
use App\Models\Instructor;

class ProjectInstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $projects = Project::all();
        $instructors = Instructor::all();

        foreach ($projects as $project) {
            $instructorCount = $faker->numberBetween(1, 2);
            $project->instructors()->attach(
                $instructors->random($instructorCount)->pluck('id')
            );
        }
    }
}
