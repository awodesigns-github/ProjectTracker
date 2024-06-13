<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['C', 'I', 'P']);

        return [
            'task_name' => $this->faker->words(3, true),
            'task_description' => $this->faker->sentence(),
            'status' => $status,
            'project_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
