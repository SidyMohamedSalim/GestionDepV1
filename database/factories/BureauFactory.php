<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bureau>
 */
class BureauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_bureau' => fake()->word(),
            'designation' => fake()->sentence(4, true),
            'capacite' => fake()->numberBetween(2, 8),
            'date_acquisition' => fake()->date()
        ];
    }
}
