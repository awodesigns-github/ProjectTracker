<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(["O", "C"]);
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'status' => $status,
            'module_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
