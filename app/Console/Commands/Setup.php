<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

/**
 * Sets up the application for first use.
 *
 * Seeds the admin user if none exist.
 * Seeds essential settings and content placeholders.
 *
 */
class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mjpweb:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the MJP application for first use.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->newline(2);
        $this->line('----------------------------------------------------');
        $this->line(' Setting up the MJP application');
        $this->line('----------------------------------------------------');
        $this->newline();

        if (User::admins()->count() > 0) {
            $this->error('An admin user already exists. Setup can only be run on a clean database.');
            $this->newline();
            $this->line('Run "artisan mjpweb:reset" to reset the application.');
            $this->newline(2);
            return;
        }

        $this->info('Running database seeder');
        $seeder = new \Database\Seeders\DatabaseSeeder();
        $seeder->run();

        $this->info('Setup complete!');
        $this->info('----------------------------------------------------');
    }
}