<?php

namespace App\Services\Ui;

use App\Models\Demo;
use App\Models\SkillJourney;
use App\Models\SkillLog;
use Illuminate\Database\Eloquent\Builder;
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
     * Each model should implement the CanBeJournalEntry interface
     * and use the IsJournable trait to get started with default methods.
     *
     * @var array
     */
    public array $journableModels = [
        SkillLog::class,
        SkillJourney::class,
        Demo::class,
    ];

    /**
     * Get the most recent journal entries.
     *
     * @param int $count
     * @return Collection
     */
    public function getRecent($count = 10)
    {
        // wip
        // $recentQuery = $this->buildUnionQuery('getJournalRecentQuery', $count);

        // $entries = DB::table($recentQuery)
        //     ->orderBy('journal_date', 'desc')
        //     ->limit($count)
        //     ->get();

        $skillLogs = SkillLog::getJournalRecentQuery($count)
            ->get()
            ->map(function ($log) {
                $log->created_at = $log->date;
                return $log;
        });
        $journeys = SkillJourney::getJournalRecentQuery($count)
            ->get()
            ->map(function ($journey) {
                $journey->created_at = $journey->completed_at;
                return $journey;
        });
        $demos = Demo::getJournalRecentQuery($count)
            ->get()
            ->map(function ($demo) {
                return $demo;
        });

        $entries = collect()
            ->concat($skillLogs)
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
        // @todo - make this a single query.....
        return collect($this->journableModels)->each(function ($model) {
            $model::getJournalFirstEntryDate();
        })->except(null)->min();
    }

    /**
     * Get the years that have journal entries along with
     * the total number of entries for that year.
     *
     * @return Collection
     */
    public function getYearsWithJournalEntries(): Collection
    {
        /**
         * Get the year sub totals from each model and create a
         * union of the $model::getJournalYearsQuery queries.
         */
        $yearSubTotalsQuery = $this->buildUnionQuery('getJournalYearsQuery');

        /**
         * Query and total the sub queries.
         */
        $years = DB::table($yearSubTotalsQuery)
            ->select(DB::raw('year as value, SUM(count) as total'))
            ->groupBy('value')
            ->orderBy('value', 'desc')
            ->get();

        return $years;
    }

    /**
     * Get the months that have journal entries along with
     * the total number of entries for that month.
     *
     * @param int $year
     * @return Collection
     */
    public function getMonthsWithJournalEntries(int $year): Collection
    {
        /**
         * Get the month sub totals from each model and create a
         * union of the $model::getJournalMonthsQuery queries.
         */
        $monthSubTotalsQuery = $this->buildUnionQuery('getJournalMonthsQuery', $year);

        /**
         * Query and total the sub queries.
         */
        $months = DB::table($monthSubTotalsQuery)
            ->select(DB::raw('month as value, SUM(count) as total'))
            ->groupBy('value')
            ->orderBy('value', 'desc')
            ->get();

        return $months;
    }

    /**
     * Build a multiple model union query by calling $method
     * with $arguments on each model.
     *
     * @param string $method
     * @param mixed ...$arguments
     * @return Builder
     */
    protected function buildUnionQuery($method, ...$arguments): Builder
    {
        $query = DB::query();
        foreach ($this->journableModels as $key => $model) {
            if ($key === 0) {
                $query = $model::$method(...$arguments);
            } else {
                $query->union($model::$method(...$arguments));
            }
        }

        return $query;
    }

}
