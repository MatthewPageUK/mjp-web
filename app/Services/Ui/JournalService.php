<?php

namespace App\Services\Ui;

use App\Models\Demo;
use App\Models\SkillJourney;
use App\Models\SkillLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Service for retrieving the journal data in the UI.
 *
 */
class JournalService
{

    /**
     * Models that can be used as journal entries.
     *
     * @var array
     */
    public static $journableModels = [
        'skillLog' => SkillLog::class,
        'skillJourney' => SkillJourney::class,
        'demo' => Demo::class,
    ];

    /**
     * Get the most recent journal entries.
     *
     * @param int $count
     * @return Collection
     */
    public function getRecent($count = 10)
    {
        // @todo wip / isJournable trait / model vars...
        $skillLogs = SkillLog::with('skills')
            ->latest('date')
            ->limit(10)
            ->get()
            ->map(function ($log) {
                $log->created_at = $log->date;
                return $log;
        });
        $journeys = SkillJourney::with('skill')
            ->whereNotNull('completed_at')
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($journey) {
                $journey->created_at = $journey->completed_at;
                return $journey;
        });
        $demos = Demo::with('skills')
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($demo) {
                return $demo;
        });

        $entries = $skillLogs
            ->concat($journeys)
            ->concat($demos)
            ->sortByDesc('created_at')
            ->take($count);

        return $entries;
    }

    public function getAll($year = null, $month = null)
    {
        if ($year && $month) {
            $from = Carbon::createFromDate($year, $month, 1);
            $to = $from->copy()->endOfMonth();
        }

        // @todo wip / isJournable trait / model vars...
        // $entries = collect();
        // foreach (self::$journableModels as $model) {
        //     $entries = $entries->concat(
        //         $model::with('skills')
        //             ->when($year && $month, function ($query) use ($from, $to) {
        //                 $query->whereBetween('created_at', [$from, $to]);
        //             })
        //             ->latest()
        //             ->get()
        //             ->map(function ($entry) {
        //                 $entry->created_at = $entry->date ?? $entry->completed_at ?? $entry->created_at;
        //                 return $entry;
        //             })
        //     );
        //     );
        // }

        $skillLogs = SkillLog::with('skills')
            ->whereBetween('date', [$from, $to])
            ->latest('date')
            ->get()
            ->map(function ($log) {
                $log->created_at = $log->date;
                return $log;
        });
        $journeys = SkillJourney::with('skill')
            ->whereNotNull('completed_at')
            ->whereBetween('completed_at', [$from, $to])
            ->latest()
            ->get()
            ->map(function ($journey) {
                $journey->created_at = $journey->completed_at;
                return $journey;
        });
        $demos = Demo::with('skills')
            ->whereBetween('created_at', [$from, $to])
            ->latest()->get()->map(function ($demo) {
                return $demo;
        });

        $entries = $skillLogs
            ->concat($journeys)
            ->concat($demos)
            ->sortByDesc('created_at');

        return $entries;
    }

    /**
     * Get the first date that a journal entry was made.
     *
     * @return Carbon
     */
    public function getFirstEntryDate()
    {
        return collect([
            SkillLog::oldest('date')->first()?->date,
            SkillJourney::oldest()->whereNotNull('completed_at')->first()?->completed_at,
            Demo::oldest()->first()?->created_at,
        ])->except(null)->min();
    }

    /**
     * Get the years that have journal entries
     *
     * @return Collection
     */
    public function getYearsWithJournalEntries(): Collection
    {
        $years = SkillLog::select(DB::raw('YEAR(date) as year'))
            ->union(SkillJourney::select(DB::raw('YEAR(completed_at) as year'))
                ->distinct()
                ->whereNotNull('completed_at'))
            ->union(Demo::select(DB::raw('YEAR(created_at) as year'))
                ->distinct())
            ->distinct()
            ->get()
            ->sortByDesc('year')
            ->pluck('year');

        return $years;
    }

    /**
     * Get the months that have journal entries
     *
     * @param int $year
     * @return Collection
     */
    public function getMonthsWithJournalEntries(int $year): Collection
    {
        $months = SkillLog::select(DB::raw('MONTH(date) as month'))
            ->whereYear('date', $year)
            ->union(SkillJourney::select(DB::raw('MONTH(completed_at) as month'))
                ->whereYear('completed_at', $year)
                ->distinct()
                ->whereNotNull('completed_at'))
            ->union(Demo::select(DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at', $year)
                ->distinct())
            ->distinct()
            ->get()
            ->sortBy('month')
            ->pluck('month');

        return $months;
    }

}
