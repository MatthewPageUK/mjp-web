<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\MjpSetup;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

/**
 * Sets up the application for first use.
 *
 * Seeds the admin user if none exist.
 * Seeds essential settings and content placeholders.
 *
 */
class Setup extends Command
{
    use MjpSetup;

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
        $this->header('Setting up the');

        if (false === $this->requireCleanDatabase()) {
            return;
        }

        $this->info('Running essential database seeder');
        $seeder = new \Database\Seeders\DatabaseSeeder();
        $seeder->run();
        $this->info('Completed database seeding');

        $this->newline();
        $email = $this->ask('Enter your admin email address');
        $password = $this->secret('Enter your admin password');

        $user = User::admins()->first();

        $user->forceFill([
            'email' => $email,
            'password' => Hash::make($password),
        ])->save();

        $this->info('Setup complete!');
        $this->info('----------------------------------------------------');
    }
}