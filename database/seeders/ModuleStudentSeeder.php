<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Module;

class ModuleStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ModuleStudent::factory()->count(25)->create();
        $faker  = Faker::create();

        $students = Student::all();
        $modules = Module::all();

        foreach ($students as $student) {
            $moduleCount = $faker->numberBetween(1, 10);
            $student->module()->attach(
                $modules->random($moduleCount)->pluck('id')
            );
        }
    }
}
