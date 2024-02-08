<?php

namespace App\Services\Ui;

use App\Models\Skill;
use Carbon\Carbon;

class SkillStatsService
{
    /**
     * Make all the stats
     *
     * @return void
     */
    public function makeAllStats()
    {
        Skill::with(['skillLogs', 'skillJourneys', 'demos', 'projects', 'books.readings'])
            ->get()
            ->each(function (Skill $skill) {
                $this->makeStatsFor($skill);
        });
    }

    /**
     * Make the stats for the given skill
     *
     * @param Skill $skill
     * @return void
     */
    public function makeStatsFor(Skill $skill)
    {
        $skill->stats()->delete();

        $skill->stats()->create([
            'key' => 'last_used',
            'value' => $this->makeLastUsedStatFor($skill),
        ]);
    }

    /**
     * Make the last used stat for the given skill
     *
     * @param Skill $skill
     * @return Carbon
     */
    protected function makeLastUsedStatFor(Skill $skill): Carbon
    {
        $skillLog = $skill->skillLogs->sortByDesc('date')->first();
        $skillJourney = $skill->skillJourneys->whereNotNull('completed_at')->sortByDesc('completed_at')->first();
        $demo = $skill->demos->sortByDesc('created_at')->first();
        $project = $skill->projects->sortByDesc('created_at')->first();
        $reading = $skill->books->reduce(function ($carry, $book) {
            return max($carry, $book->readings->sortByDesc('created_at')->first()?->created_at);
        }, null);

        return max(
            $skillLog?->date ?? null,
            $skillJourney?->completed_at ?? null,
            $demo?->created_at ?? null,
            $project?->created_at ?? null,
            $reading?->created_at ?? null,
        ) ?? Carbon::now()->subYears(10);
    }
}