<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Trait for models that can be used as Journal entries.
 *
 */
trait IsJournable
{

    /**
     * Get the date field used for logging in the journal.
     *
     * @return string
     */
    public static function getJournalDateField(): string
    {
        return 'created_at';
    }

    /**
     * Get the years and totals.
     *
     * @return Builder
     */
    public static function getJournalYearsQuery(): Builder
    {
        return self::select(DB::raw('YEAR(' . static::getJournalDateField() . ') as year, COUNT(*) as count'))
            ->whereNotNull(static::getJournalDateField())
            ->groupBy('year')
            ->orderBy('year', 'desc');
    }

    /**
     * Get the months and totals for the supplied year.
     *
     * @return Builder
     */
    public static function getJournalMonthsQuery(int $year): Builder
    {
        return self::select(DB::raw('MONTH(' . static::getJournalDateField() . ') as month, COUNT(*) as count'))
            ->whereNotNull(static::getJournalDateField())
            ->whereYear(static::getJournalDateField(), $year)
            ->groupBy('month')
            ->orderBy('month', 'desc');
    }

    /**
     * The the first entry in the journal.
     *
     * @return string
     */
    public static function getJournalFirstEntryDate(): string|null
    {
        return self::oldest(static::getJournalDateField())
            ->whereNotNull(static::getJournalDateField())
            ->first()?->static::getJournalDateField();
    }

    /**
     * Get the recent journal entries.
     *
     * @param int $count
     * @return Builder
     */
    public static function getJournalRecentQuery(int $count): Builder
    {
        return self::select(DB::raw('*, ' . static::getJournalDateField() . ' as journal_date'))
            ->with(static::getJournalRelations())
            ->latest(static::getJournalDateField())
            ->limit(10);
    }

    public static function getJournalRelations(): array
    {
        return ['skills'];
    }
}
