<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\MjpSetup;
use App\Services\Ui\SkillStatsService;
use Illuminate\Console\Command;

/**
 * Makes / calculates the skill stats records
 *
 */
class MakeSkillStats extends Command
{
    use MjpSetup;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mjpweb:make-skill-stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make the skill stats.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->header('Make Skill Stats for');

        app(SkillStatsService::class)->makeAllStats();

        $this->newLine();
        $this->info('Done, stats made');
        $this->newLine();
        $this->line('----------------------------------------------------');
    }
}