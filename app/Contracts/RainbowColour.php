<?php

namespace App\Contracts;

/**
 * UI - Rainbow Colour.
 *
 * Interface for a rainbow colour features.
 *
 * @method string getNextColour()
 * @method void resetColour()
 */
interface RainbowColour
{
    /**
     * Get the next colour in the rainbow.
     *
     * @return string
     */
    public function getNextColour(): string;

    /**
     * Reset the colour to the first colour in the rainbow.
     *
     * @return void
     */
    public function resetColour(): void;
}