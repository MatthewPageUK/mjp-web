<?php

namespace Database\Seeders;

use App\Models\{
    BulletPoint,
    Demo,
    Experience,
    Image,
    Post,
    PostCategory,
    Project,
    Skill,
    SkillGroup,
    User,
};
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
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
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo2@example.com',
            'is_admin' => 0,
        ]);

        BulletPoint::factory()
            ->count(10)
            ->create();


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
                ->hasImage()
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
            $post->image()->save(Image::factory()->make());
        });

        Demo::factory()
            ->count(5)
            ->create()
            ->each(function ($demo) {
                $demo->skills()->attach(Skill::all()->random(3));
                $demo->posts()->attach(Post::all()->random(3));
                $demo->image()->save(Image::factory()->make());
            });

        Experience::factory()
            ->count(5)
            ->create()
            ->each(function ($experience) {
                $experience->skills()->attach(Skill::all()->random(8));
                $experience->posts()->attach(Post::all()->random(3));
                $experience->image()->save(Image::factory()->make());
            });

        Project::factory()
            ->count(5)
            ->create()
            ->each(function ($project) {
                $project->skills()->attach(Skill::all()->random(3));
                $project->posts()->attach(Post::all()->random(3));
                $project->image()->save(Image::factory()->make());
            });

    }
}
