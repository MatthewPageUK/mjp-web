<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Create a demo / faker skill journey item
 *
 */
class SkillJourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(6),
            'completed_at' => fake()->randomElement([null, fake()->dateTimeBetween('-1 year', 'now')]),
            'skill_id' => Skill::factory(),
        ];
    }

}
