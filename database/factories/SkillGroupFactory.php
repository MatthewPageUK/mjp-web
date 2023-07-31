<?php

namespace Database\Factories;

use Database\Factories\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Create a demo / faker skill group
 *
 */
class SkillGroupFactory extends Factory
{
    use HasActive;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Design', 'Development', 'Marketing', 'Management']),
            'description' => fake()->paragraphs(3, true),
            'active' => true,
        ];
    }

}
