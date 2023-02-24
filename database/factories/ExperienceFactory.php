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
        $start = fake()->dateTimeBetween('-10 years');
        $end = $start->modify('+100 days');

        return [
            'start' => $start,
            'end' => $end,
            'title' => fake()->sentence(),
            'description' => fake()->paragraphs(3, true),
            'active' => true,
        ];
    }

}
