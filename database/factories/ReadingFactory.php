<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reading>
 */
class ReadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chapter' => $this->faker->sentence(3),
            'pages' => sprintf('%s to %s', $this->faker->numberBetween(0, 35), $this->faker->numberBetween(35, 50)),
            'minutes' => $this->faker->numberBetween(15, 120),
            'notes' => $this->faker->sentence(6),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
