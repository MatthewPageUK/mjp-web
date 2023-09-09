<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'https://loremflickr.com/640/360/technology?lock=' . rand(1000, 100000),
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Project',
            'created_at' => fake()->dateTimeBetween('-3 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-2 year', 'now'),
        ];
    }

}
