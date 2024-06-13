<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Modules Seeder
        Module::factory()->create([
            'name' => 'Artificial Intelligence',
            'course_id' => 1,
            'instructor_id' => 1
        ]);

        Module::factory()->create([
            'name' => 'Networking',
            'course_id' => 1,
            'instructor_id' => 1
        ]);

        Module::factory()->create([
            'name' => 'System Administration',
            'course_id' => 1,
            'instructor_id' => 1
        ]);

        Module::factory()->create([
            'name' => 'Mobile Development',
            'course_id' => 1,
            'instructor_id' => 1
        ]);

        Module::factory()->create([
            'name' => 'Project Management',
            'course_id' => 1,
            'instructor_id' => 1
        ]);
    }
}
