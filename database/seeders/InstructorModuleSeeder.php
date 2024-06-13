<?php

namespace Database\Seeders;

use App\Models\Instructor;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InstructorModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker  = Faker::create();

        $instructors = Instructor::all();
        $modules = Module::all();

        foreach ($instructors as $instructor) {
            $moduleCount = 5;
            $instructor->module()->attach(
                $modules->random($moduleCount)->pluck('id')
            );
        }
    }
}
