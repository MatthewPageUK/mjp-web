<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GithubRepo>
 */
class GithubRepoFactory extends Factory
{
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'https://github.com/MatthewPageUK/mjp-web',
            'owner' => 'MatthewPageUK',
            'name' => 'mjp-web',
            'githubable_id' => 1,
            'githubable_type' => 'App\Models\Project',
            'created_at' => fake()->dateTimeBetween('-3 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-2 year', 'now'),
        ];
    }

}
