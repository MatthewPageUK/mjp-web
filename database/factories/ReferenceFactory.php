<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reference>
 */
class ReferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'position' => fake()->jobTitle,
            'company' => fake()->company,
            'email' => fake()->safeEmail,
            'phone' => fake()->phoneNumber,
            'notes' => fake()->sentence,
        ];
    }
}
