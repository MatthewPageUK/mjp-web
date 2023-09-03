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
use Database\Factories\MastheadFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data
     * for development only.
     *
     * Demo user (admin and normal)
     * Demo settings
     * 3 Skill Groups with 5 skills in each
     * 3 Post Categories with 5 posts in each
     * 5 Demos
     * 5 Experiences
     * 5 Projects
     * Skillable - attach 3 random skills to each skillable
     * Postable - attach 3 random posts to each postable
     * 5 Mastheads
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
        DB::table('postables')->truncate();
        DB::table('demos')->truncate();
        DB::table('experiences')->truncate();
        DB::table('projects')->truncate();
        DB::table('bullet_points')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->admin()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
        ]);

        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo2@example.com',
            'is_admin' => 0,
        ]);

        BulletPoint::factory()
            ->count(10)
            ->create();

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
            'key' => 'contact_email',
            'value' => fake()->email(),
            'type' => 'text',
        ]);

        Setting::create([
            'key' => 'register_intro',
            'value' => fake()->text(300),
            'type' => 'text',
        ]);

        /**
         * Skills
         */
        SkillGroup::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Web Development'],
                ['name' => 'Management'],
                ['name' => 'Organisational'],
            )
            ->create();

        $skills = ['PHP', 'Laravel', 'Vue', 'JavaScript', 'CSS',
            'HTML', 'MySQL', 'Git', 'Linux', 'Docker', 'AWS', 'Google Cloud',
            'Azure', 'Heroku', 'Digital Ocean', 'Vagrant', 'Nginx', 'Apache',
            'Caching', 'Redis', 'Memcached', 'Queueing', 'RabbitMQ',
            'Beanstalkd', 'Supervisor'];

        for ($x = 0; $x < count($skills); $x++) {
            Skill::factory(['name' => $skills[$x]])
                ->hasAttached(SkillGroup::all()->random(1))
                ->create();
        }

        PostCategory::factory()
            ->count(3)
            ->sequence(
                ['name' => 'Web Stuff'],
                ['name' => 'Not work stuff'],
                ['name' => 'Tutorials'],
            )
            ->hasPosts(10)
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
                $experience->skills()->attach(Skill::all()->random(8));
                $experience->posts()->attach(Post::all()->random(3));
            });

        Project::factory()
            ->count(5)
            ->create()
            ->each(function ($project) {
                $project->skills()->attach(Skill::all()->random(3));
                $project->posts()->attach(Post::all()->random(3));
            });

        // MastheadFactory::new()
        //     ->count(5)
        //     ->sequence(fn (Sequence $sequence) => ['order' => $sequence->index + 1])
        //     ->create();
    }
}
