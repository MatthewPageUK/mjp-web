<?php

namespace Database\Factories;

use Database\Factories\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    use HasActive;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-30 years');
        $end = fake()->dateTimeBetween($start, $start->format('Y-m-d').' +200 days');
        $key_points = [];
        for ($i = 0; $i < rand(2, 5); $i++) {
            $key_points[] = ['title' => fake()->sentence(4), 'text' => fake()->sentence()];
        }

        return [
            'start' => $start->format('Y-m-d'),
            'end' => $end->format('Y-m-d'),
            'name' => fake()->sentence(4),
            'slug' => fake()->slug(),
            'description' => fake()->paragraphs(3, true),
            'key_points' => $key_points,
            'active' => true,
        ];
    }

}
