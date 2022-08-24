<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(2),
            'category' => fake()->word(1),
            'price' => fake()->numberBetween(10, 20)*1000,
            'desc' => fake()->paragraph(2),
        ];
    }

}
