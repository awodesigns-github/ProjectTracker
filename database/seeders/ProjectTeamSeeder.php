<?php

namespace Database\Seeders;

use App\Models\ProjectTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Project;
use App\Models\Team;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ProjectTeam::factory()->count(25)->create();
        $faker = Faker::create();

        $projects = Project::all();
        $teams = Team::all();

        foreach ($projects as $project) {
            $teamCount = 5;
            $project->team()->attach(
                $teams->random($teamCount)->pluck('id')
            );
        }

    }
}
