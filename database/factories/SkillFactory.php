<?php

namespace Database\Factories;

use Database\Factories\Traits\HasActive;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Create a demo / faker skill
 *
 */
class SkillFactory extends Factory
{
    use HasActive;

    // Some random skills to seed with
    private $skills = ['PHP', 'Laravel', 'Vue', 'JavaScript', 'CSS',
        'HTML', 'MySQL', 'Git', 'Linux', 'Docker', 'AWS', 'Google Cloud',
        'Azure', 'Heroku', 'Digital Ocean', 'Vagrant', 'Nginx', 'Apache',
        'Caching', 'Redis', 'Memcached', 'Queueing', 'RabbitMQ',
        'Beanstalkd', 'Supervisor'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->skills),     // @todo make this a sequence not random
            'description' => fake()->paragraphs(3, true),
            'level' => fake()->numberBetween(1, 10),
            'active' => true,
        ];
    }

    /**
     * The Skill should have the level supplied
     *
     * @param int $level
     * @return Illuminate\Database\Eloquent\Factories\Factory
     */
    public function level(int $level): Factory
    {
        return $this->state(fn (array $attributes) => [
            'level' => $level,
        ]);
    }
}
