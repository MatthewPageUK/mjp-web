<?php

namespace App\Console\Commands;

use App\Models\BulletPoint;
use App\Models\Demo;
use App\Models\Experience;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\SkillGroup;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Resets the application, deleting all user
 * data, admins and files.
 *
 * Deletes all data !
 *
 */
class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mjpweb:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the application and delete all database content.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->newline(2);
        $this->line('----------------------------------------------------');
        $this->line(' Reset the MJP application');
        $this->line('----------------------------------------------------');
        $this->newline();

        $this->warn('This will delete all the database content.');

        $table = [
            ['Bullet Points', BulletPoint::all()->count()],
            ['Demos', Demo::all()->count()],
            ['Experiences', Experience::all()->count()],
            ['Posts', Post::all()->count()],
            ['Post Categories', PostCategory::all()->count()],
            ['Projects', Project::all()->count()],
            ['Settings', Setting::all()->count()],
            ['Skills', Skill::all()->count()],
            ['Skill Groups', SkillGroup::all()->count()],
            ['Users', User::all()->count()],
        ];

        $this->table(
            ['Table', 'Count'],
            $table
        );

        if (! $this->confirm('Are you sure?')) {
            $this->info('Reset cancelled.');
            return;
        }

        $this->warn('This will delete all the database content.');

        if (! $this->confirm('Really? You want to delete all the database content?')) {
            $this->info('Reset cancelled.');
            return;
        }

        $this->info('Resetting application...');

        Log::critical('Resetting application via artisan command.');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('bullet_points')->truncate();
        DB::table('demos')->truncate();
        DB::table('experiences')->truncate();
        DB::table('images')->truncate();
        DB::table('post_categories')->truncate();
        DB::table('post_post_category')->truncate();
        DB::table('postables')->truncate();
        DB::table('posts')->truncate();
        DB::table('projects')->truncate();
        DB::table('settings')->truncate();
        DB::table('skill_groups')->truncate();
        DB::table('skill_skill_group')->truncate();
        DB::table('skillables')->truncate();
        DB::table('skills')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Reset complete - please run `artisan mjpweb:setup` to setup the default data.');

    }
}