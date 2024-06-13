<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Module;
use App\Models\ModuleStudent;

class ModuleStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Module student
        ModuleStudent::create([
            'module_id' => 1,
            'student_id' => 1
        ]);

        ModuleStudent::create([
            'module_id' => 2,
            'student_id' => 1
        ]);

        ModuleStudent::create([
            'module_id' => 3,
            'student_id' => 1
        ]);

        ModuleStudent::create([
            'module_id' => 4,
            'student_id' => 1
        ]);

        ModuleStudent::create([
            'module_id' => 5,
            'student_id' => 1
        ]);

        ModuleStudent::create([
            'module_id' => 1,
            'student_id' => 2
        ]);

        ModuleStudent::create([
            'module_id' => 2,
            'student_id' => 2
        ]);

        ModuleStudent::create([
            'module_id' => 3,
            'student_id' => 2
        ]);

    
        ModuleStudent::create([
            'module_id' => 4,
            'student_id' => 2
        ]);

        ModuleStudent::create([
            'module_id' => 5,
            'student_id' => 2
        ]);
    }
}
