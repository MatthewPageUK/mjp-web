<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface CanBeJournalEntry
{
    /**
     * Get the years and totals.
     *
     * @return Builder
     */
    public static function getJournalYearsQuery(): Builder;

    /**
     * Get the months and totals for the supplied year.
     *
     * @return Builder
     */
    public static function getJournalMonthsQuery(int $year): Builder;

    /**
     * Get the date field used for logging in the journal.
     *
     * @return string
     */
    public static function getJournalDateField(): string;

    /**
     * The the first entry in the journal.
     *
     * @return string|null
     */
    public static function getJournalFirstEntryDate(): string|null;

    /**
     * Get the recent journal entries.
     *
     * @param int $count
     * @return Builder
     */
    public static function getJournalRecentQuery(int $count): Builder;

}