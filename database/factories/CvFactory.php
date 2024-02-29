<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cv>
 */
class CvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issue_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'issued_to_person' => fake()->name(),
            'issued_to_company' => fake()->company(),
            'name' => 'Faker CV for ' . fake()->name(),
        ];
    }
}
