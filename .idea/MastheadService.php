<?php

namespace App\Services;

use App\Models\Masthead;

/**
 * Service for managing and retrieving Mastheads.
 *
 * @method Masthead getRandom(): Masthead
 * @method Masthead getNextMasthead(Masthead $masthead): Masthead
 */
class MastheadService
{
    /**
     * Get a random Masthead.
     *
     * @return Masthead
     */
    public function getRandom(): Masthead
    {
        return Masthead::inRandomOrder()
            ->first();
    }

    /**
     * Get the next Masthead or the first one if there is no more.
     *
     * @param Masthead $masthead    The currently displayed Masthead
     * @return Masthead
     */
    public function getNext(Masthead $masthead): Masthead
    {
        return Masthead::where('order', '>', $masthead->order)
            ->ordered()
            ->firstOr(function () {
                return Masthead::ordered()->first();
            });
    }

}
