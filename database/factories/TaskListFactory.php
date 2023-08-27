<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskList>
 */
class TaskListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'list_name' => $this->faker->sentence(8, true),
            'list_description' => $this->faker->sentences(4, true),
            'user_id' => $this->faker->numberBetween(1, 4),
            'created_at' => $this->faker->date,
        ];
    }
}
