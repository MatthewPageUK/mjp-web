<?php

namespace Database\Factories;

use Database\Factories\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'name' => fake()->sentence(4),
            'description' => fake()->paragraphs(3, true),
            'github' => 'https://github.com/MatthewPageUK/mjp-web',
            'website' => fake()->url(),
            'last_active' => fake()->dateTimeBetween('-1 year'),
            'active' => true,
        ];
    }

}
