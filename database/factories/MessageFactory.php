<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Create a demo / faker message
 *
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'company' => fake()->company(),
            'telephone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'message' => fake()->paragraphs(3, true),
        ];
    }
}
