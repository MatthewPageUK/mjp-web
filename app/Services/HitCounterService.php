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
     * @return int
     */
    public function hit(string $page): int
    {
        $hitCounter = HitCounter::firstOrCreate([
            'page' => $page,
        ]);

        $hitCounter->increment('hits');

        return $hitCounter->hits;
    }

}
