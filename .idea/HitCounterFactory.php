<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HitCounter>
 */
class HitCounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page' => $this->faker->unique()->word,
            'hits' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
