<?php

namespace App\Services\Traits;

/**
 * Helper trait with a rainbow of colours and a
 * colour cycling method.
 *
 * @method string getNextColour()
 * @method void resetColour()
 */
trait WithRainbow
{
    /**
     * Last colour index used.
     *
     * @var int
     */
    public static $lastColour = 0;

    /**
     * Colours of the rainbow.
     *
     * @var array<string>
     */
    public static $colours = [
        'bg-red-400',
        'bg-orange-400',
        'bg-amber-400',
        'bg-yellow-400',
        'bg-lime-400',
        'bg-green-400',
        'bg-emerald-400',
        'bg-teal-400',
        'bg-cyan-400',
        'bg-sky-400',
        'bg-blue-400',
        'bg-indigo-400',
        'bg-violet-400',
        'bg-purple-400',
        'bg-fuchsia-400',
        'bg-pink-400',
        'bg-rose-400',
    ];

    /**
     * Get the next colour and increment the last
     * colour counter, loop if needed.
     *
     * @return string
     */
    public function getNextColour(): string
    {
        $colour = self::$colours[self::$lastColour];

        self::$lastColour++;

        if (self::$lastColour >= count(self::$colours)) {
            self::$lastColour = 0;
        }

        return $colour;
    }

    /**
     * Reset the colour counter.
     *
     * @return void
     */
    public function resetColour(): void
    {
        self::$lastColour = 0;
    }
}