<?php

namespace Database\Seeders;

use App\Models\{
    BulletPoint,
    Demo,
    Experience,
    Post,
    PostCategory,
    Project,
    Setting,
    Skill,
    SkillGroup,
    User,
};
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with essential
     * settings and default admin user.
     *
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'demos_intro',
            'value' => fake()->text(600),
            'type' => 'text',
        ]);

    }
}
