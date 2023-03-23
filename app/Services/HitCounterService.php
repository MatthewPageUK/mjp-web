<?php

namespace App\Services;

use App\Models\HitCounter;

/**
 * Service for managing Hit Counters.
 *
 * @method hit(string $page): void
 */
class HitCounterService
{
    /**
     * Register a hit on a page
     *
     * @param string $page
     * @return HitCounter
     */
    public function hit(string $page): HitCounter
    {
        $hitCounter = HitCounter::firstOrCreate([
            'page' => $page,
        ]);

        $hitCounter->increment('hits');

        return $hitCounter;
    }

    /**
     * Get the number of days since the first hit on a page
     *
     * @param string|HitCounter $page
     * @return int
     */
    public function daysSinceFirstHit(string|HitCounter $page): int
    {
        if (! $page instanceof HitCounter) {
            $hitCounter = HitCounter::where('page', $page)->first();
        } else {
            $hitCounter = $page;
        }

        if ($hitCounter) {
            return $hitCounter->created_at->diffInDays();
        }

        return 0;
    }

    /**
     * Get the number of hits per day on a page
     *
     * @param string|HitCounter $page
     * @return float
     */
    public function hitsPerDay(string|HitCounter $page): float
    {
        if (! $page instanceof HitCounter) {
            $hitCounter = HitCounter::where('page', $page)->first();
        } else {
            $hitCounter = $page;
        }

        if ($hitCounter) {
            return $hitCounter->hits / max(1, $this->daysSinceFirstHit($page));
        }

        return 0.0;
    }
}
