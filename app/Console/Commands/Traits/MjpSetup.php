<?php

namespace App\Console\Commands\Traits;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

trait MjpSetup
{
    /**
     * Fancy header
     */
    public function header($action)
    {
        $this->newline(2);
        $this->line('----------------------------------------------------');
        $this->line(' ' . $action . ' MJP application.');
        $this->line('----------------------------------------------------');
        $this->warn(' '.Str::upper(App::environment()).' environment');
        $this->line('----------------------------------------------------');
        $this->newline();
    }

    public function requireCleanDatabase()
    {
        if (User::admins()->count() > 0) {
            $this->error('An admin user already exists. Setup can only be run on a clean database.');
            $this->newline();
            $this->line('Run "artisan mjpweb:reset" to reset the application.');
            $this->newline(2);
            return false;
        }

        return true;
    }

}
