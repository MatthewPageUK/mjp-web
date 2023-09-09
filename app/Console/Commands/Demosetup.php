<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\MjpSetup;
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
 * Resets the application and populates
 * with demo data.
 *
 */
class Demosetup extends Command
{
    use MjpSetup;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mjpweb:demosetup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the application and populate database with demo content.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->header('Setting up the demo');

        if (false === $this->requireCleanDatabase()) {
            return;
        }

        $this->info('Running database seeder');
        $seeder = new \Database\Seeders\DatabaseSeeder();
        $seeder->run();

        $this->info('Running demo seeder');
        $seeder = new \Database\Seeders\DemoSeeder();
        $seeder->run();


        $this->info('Demo setup complete.');
        $this->info('----------------------------------------------------');
    }
}