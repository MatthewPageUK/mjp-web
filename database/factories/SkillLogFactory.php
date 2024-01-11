<?php

namespace Database\Factories;

use App\Enums\SkillLogLevel;
use App\Enums\SkillLogType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillLog>
 */
class SkillLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(SkillLogType::values()),
            'level' => $this->faker->randomElement(SkillLogLevel::values()),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'minutes' => $this->faker->randomElement([15, 30, 45, 60, 90, 120]),
            'description' => $this->faker->sentence(),
            'notes' => $this->faker->paragraph(),
        ];
    }
}
