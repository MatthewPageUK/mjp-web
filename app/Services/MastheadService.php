<?php

namespace App\Services;

use App\Models\Masthead;

/**
 * Service for managing Mastheads.
 *
 */
class MastheadService
{
    /**
     * Get a random Masthead.
     *
     * @return Masthead
     */
    public function getRandomMasthead(): Masthead
    {
        return Masthead::inRandomOrder()->first();
    }

    /**
     * Get the next Masthead or the first one if there is no next.
     *
     * @param Masthead $masthead
     * @return Masthead
     */
    public function getNextMasthead(Masthead $masthead): Masthead
    {
        $next = Masthead::where('order', '>', $masthead->order)->orderBy('order')->first();

        if (! $next) {
            $next = Masthead::orderBy('order')->first();
        }

        return $next;
    }

}
