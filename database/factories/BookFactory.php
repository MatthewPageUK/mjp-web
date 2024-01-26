<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'tagline' => $this->faker->sentence(6),
            'author' => $this->faker->name(),
            'isbn' => $this->faker->isbn13(),
            'publisher' => $this->faker->company(),
            'first_published' => $this->faker->date(),
            'published' => $this->faker->date(),
            'read_count' => $this->faker->numberBetween(0, 5),
            'notes' => $this->faker->paragraph(),
        ];
    }
}
