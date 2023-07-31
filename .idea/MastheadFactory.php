<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masthead>
 */
class MastheadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'tagline' => $this->faker->sentence,
            'more_url' => $this->faker->url,
            'url' => $this->faker->url,
            'order' => $this->faker->numberBetween(1, 10),
            'hide_on_mobile' => $this->faker->boolean,
        ];
    }
}
