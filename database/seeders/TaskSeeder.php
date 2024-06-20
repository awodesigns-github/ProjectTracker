<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();

        // Task::factory()->count(25)->create();
        $projects->each(function ($project) {
            $tasks = Task::factory()->count(5)->create(['project_id' => $project->id]);

            $project->task()->saveMany($tasks);
        });
    }
}
