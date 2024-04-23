<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Module;
use Faker\Factory as Faker;

class ModuleTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ModuleTeam::factory()->count(25)->create();
        $faker  = Faker::create();

        $teams = Team::all();
        $modules = Module::all();

        foreach ($teams as $team) {
            $moduleCount = $faker->numberBetween(1, 10);
            $team->module()->attach(
                $modules->random($moduleCount)->pluck('id')
            );
        }
    }
}
