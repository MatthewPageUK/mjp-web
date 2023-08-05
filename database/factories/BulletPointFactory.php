<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Create a demo / faker bullet point
 *
 */
class BulletPointFactory extends Factory
{
    /**
     * Sort order
     *
     * @var int
     */
    private static $order = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2, false),
            'order' => self::$order++,
        ];
    }

}
