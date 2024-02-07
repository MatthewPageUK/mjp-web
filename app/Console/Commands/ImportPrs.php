<?php

namespace App\Console\Commands;

use App\Console\Commands\Traits\MjpSetup;
use App\Models\Skill;
use App\Models\SkillLog;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

/**
 * Import PRs from tab file into Skill Logs
 *
 * date | description | notes | duration | skills list
 *
 */
class ImportPrs extends Command
{
    use MjpSetup;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mjpweb:import-prs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import PRs into Skill Logs.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->header('Import PRs');
        $filename = $this->ask('Enter file name');
        $data = [];
        try {
            $file = fopen(storage_path().'/'.$filename, 'r');
            while(($line = fgetcsv($file, separator: "\t"))!==false) {
                $data[] = $line;
            }
            fclose($file);
        } catch (\Exception $e) {
            $this->error('Error: '.$e->getMessage());
            return;
        }

        $this->info('Analysing data...');
        $count = 0;

        foreach($data as $row) {
            $skills = explode(',', $row[4]);
            foreach($skills as $skillSlug) {
                $skill = Skill::where('slug', $skillSlug)->first();
                if ($skill) {
                } else {
                    $this->error('Skill not found: ' . $skill . ' ' . $skillSlug);
                }
            }
            $count++;
        }

        $this->info('Total skill logs ' . $count);

        if (! $this->confirm('Proceed with import?')) {
            $this->info('Import cancelled.');
            return;
        }

        foreach($data as $row) {
            $skillLog = SkillLog::create([
                'date' => $row[0],
                'description' => $row[1],
                'notes' => $row[2],
                'minutes' => $row[3],
                'type' => 'use',
                'level' => 'intermediate',
            ]);

            $skills = explode(',', $row[4]);
            foreach($skills as $skillSlug) {
                $skill = Skill::where('slug', $skillSlug)->first();
                if ($skill) {
                    $skillLog->skills()->attach($skill);
                } else {
                    $this->error('Skill not found: ' . $skill . ' ' . $skillSlug);
                }
            }
            $this->info('Imported: ' . $row[0] . ' ' . $row[1] . ' ' . $row[2] . ' ' . $row[3] . ' ' . $row[4]);
        }

        $this->info('Import complete!');
        $this->info('----------------------------------------------------');
    }
}