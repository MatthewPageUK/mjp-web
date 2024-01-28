<?php

namespace Database\Seeders;

use App\Models\{
    BulletPoint,
    Demo,
    Experience,
    GithubRepo,
    Image,
    Message,
    Post,
    PostCategory,
    Project,
    Skill,
    SkillGroup,
    SkillLog,
    User,
};
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database with demo data
     * for development only.
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

        foreach ($skills as $skill) {
            Skill::factory(['name' => $skill])
                ->hasAttached(SkillGroup::all()->random(1))
                ->hasImage()
                ->hasSkillJourneys(10)
                ->create();
        }

        SkillLog::factory()
            ->count(100)
            ->create()
            ->each(function ($skillLog) {
                $skillLog->skills()->attach(Skill::all()->random(1));
            });

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
            $post->githubRepo()->save(GithubRepo::factory()->make());
        });

        Demo::factory()
            ->hasGithubRepo()
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
            ->hasGithubRepo()
            ->count(5)
            ->create()
            ->each(function ($project) {
                $project->skills()->attach(Skill::all()->random(3));
                $project->posts()->attach(Post::all()->random(3));
                $project->image()->save(Image::factory()->make());
            });

        Message::factory()
            ->count(10)
            ->create();

        $this->call(BookSeeder::class);
        $this->call(AvailabilitySeeder::class);

    }
}
