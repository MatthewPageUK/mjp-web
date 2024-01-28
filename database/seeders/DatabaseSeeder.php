<?php

namespace Database\Seeders;

use App\Models\{
    Setting,
    User,
};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with essential
     * settings and default admin user.
     *
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
        ]);

        // Essential settings
        Setting::create([
            'key' => 'site_name',
            'value' => 'My Web Site',
        ]);
        Setting::create([
            'key' => 'site_tagline',
            'value' => 'A cool place to hang out....',
        ]);
        Setting::create([
            'key' => 'source',
            'value' => 'https://github.com/MatthewPageUK/mjp-web',
        ]);
        Setting::create([
            'key' => 'url_github',
            'value' => 'https://github.com',
        ]);
        Setting::create([
            'key' => 'url_linkedin',
            'value' => 'https://www.linkedin.com',
        ]);
        Setting::create([
            'key' => 'url_youtube',
            'value' => 'https://www.youtube.com',
        ]);
        Setting::create([
            'key' => 'experience_intro',
            'value' => fake()->text(255),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'homepage_name',
            'value' => fake()->sentence(2),
        ]);
        Setting::create([
            'key' => 'homepage_tagline',
            'value' => fake()->sentence(5),
        ]);
        Setting::create([
            'key' => 'homepage_intro',
            'value' => fake()->text(600),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'skills_intro',
            'value' => fake()->text(600),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'skills_content',
            'value' => fake()->text(600),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'demos_intro',
            'value' => fake()->text(600),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'contact_email',
            'value' => fake()->email(),
            'type' => 'text',
        ]);
        Setting::create([
            'key' => 'register_intro',
            'value' => fake()->text(300),
            'type' => 'text',
        ]);

        $this->call(AvailabilitySeeder::class);

    }
}
