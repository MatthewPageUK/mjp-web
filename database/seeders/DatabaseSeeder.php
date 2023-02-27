<?php

namespace Database\Seeders;

use App\Models\{
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
     * Seed the application's database with demo data
     * for development only.
     *
     * Demo user
     * Demo settings
     * 3 Skill Groups with 5 skills in each
     * 3 Post Categories with 5 posts in each
     * 5 Demos
     * 5 Experiences
     * 5 Projects
     * Skillable - attach 3 random skills to each skillable
     * Postable - attach 3 random posts to each postable
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('settings')->truncate();
        DB::table('skills')->truncate();
        DB::table('skill_groups')->truncate();
        DB::table('skill_skill_group')->truncate();
        DB::table('skillables')->truncate();
        DB::table('posts')->truncate();
        DB::table('post_categories')->truncate();
        DB::table('post_post_category')->truncate();
        DB::table('demos')->truncate();
        DB::table('experiences')->truncate();
        DB::table('projects')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
        ]);

        Setting::factory()
            ->count(5)
            ->create();

        Setting::create([
            'key' => 'site_name',
            'value' => 'My Web Site',
        ]);
        Setting::create([
            'key' => 'site_tagline',
            'value' => 'A cool place to hang out....',
        ]);
        Setting::create([
            'key' => 'url_github',
            'value' => 'https://www.github.com/MatthewPageUK',
        ]);
        Setting::create([
            'key' => 'url_linkedin',
            'value' => 'https://www.linkedin.com',
        ]);
        Setting::create([
            'key' => 'url_youtube',
            'value' => 'https://www.youtube.com',
        ]);

        SkillGroup::factory()
            ->count(3)
            ->state(new Sequence(
                ['name' => 'Web Development'],
                ['name' => 'Management'],
                ['name' => 'Organisational'],
            ))
            ->hasSkills(5)
            ->create();

        PostCategory::factory()
            ->count(3)
            ->state(new Sequence(
                ['name' => 'Web Stuff'],
                ['name' => 'Not work stuff'],
                ['name' => 'Tutorials'],
            ))
            ->hasPosts(5)
            ->create();

        Post::all()->each(function ($post) {
            $post->skills()->attach(Skill::all()->random(3));
        });

        Demo::factory()
            ->count(5)
            ->create()
            ->each(function ($demo) {
                $demo->skills()->attach(Skill::all()->random(3));
                $demo->posts()->attach(Post::all()->random(3));
            });

        Experience::factory()
            ->count(5)
            ->create()
            ->each(function ($experience) {
                $experience->skills()->attach(Skill::all()->random(3));
                $experience->posts()->attach(Post::all()->random(3));
            });

        Project::factory()
            ->count(5)
            ->create()
            ->each(function ($project) {
                $project->skills()->attach(Skill::all()->random(3));
                $project->posts()->attach(Post::all()->random(3));
            });
    }
}
