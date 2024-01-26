<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait HasDuration
{
    /**
     * Get the duration in hours (rounded to 1 decimal place)
     *
     * @return float
     */
    public function getHoursAttribute(): float
    {
        return round($this->minutes / 60, 1);
    }

    /**
     * Get the duration in hours or minutes depending on the duration
     *
     * @return string
     */
    public function getDurationAttribute(): string
    {
        if ($this->minutes < 60) {
            return $this->minutes . Str::plural(' minute', ceil($this->minutes));
        }

        return $this->hours . Str::plural(' hour', ceil($this->hours));
    }
}