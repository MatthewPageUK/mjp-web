<?php

namespace Database\Factories;

use App\Enums\CvSectionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CvSection>
 */
class CvSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => CvSectionType::Text,
            'name' => 'Fake CV section ' . fake()->sentence(4),
            'heading' => fake()->sentence(5),
            'sub_heading' => fake()->sentence(8),
            'content' => fake()->text,
        ];
    }
}
