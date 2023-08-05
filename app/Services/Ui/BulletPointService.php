<?php

namespace App\Services\Ui;

use App\Models\BulletPoint;
use App\Services\Traits\WithRainbow;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Bullet Points in th UI.
 *
 */
class BulletPointService
{
    use WithRainbow;

    /**
     * Get all bullet points with a rainbow colour.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        $bulletPoints =  BulletPoint::orderBy('order')->get();

        $bulletPoints = $bulletPoints->map(function ($bulletPoint) {
            $bulletPoint->colour = $this->getNextColour();
            return $bulletPoint;
        });

        $this->resetColour();

        return $bulletPoints;
    }
}
