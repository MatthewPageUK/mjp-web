<?php

namespace Database\Seeders;

use App\Models\SkillGroup;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data
     * for development only.
     *
     * 3 Skill Groups with 5 skills in each
     */
    public function run(): void
    {
        SkillGroup::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Web Development'],
                ['name' => 'Management'],
                ['name' => 'Organisational'],
            )
            ->hasSkills(5)
            ->create();
    }
}
