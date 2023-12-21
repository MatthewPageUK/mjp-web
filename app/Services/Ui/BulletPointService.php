<?php

namespace App\Services\Ui;

use App\Models\BulletPoint;
use App\Services\Traits\WithRainbow;
use Illuminate\Database\Eloquent\Collection;

/**
 * UI - Bullet Point Service.
 *
 * Service for managing Bullet Points in the
 * frontend web site.
 *
 */
class BulletPointService
{
    use WithRainbow;

    /**
     * Get all bullet points with a rainbow colour
     * attached as $model->colour.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            // Get all the bullet points in order
            $bulletPoints =  BulletPoint::orderBy('order')->get();

        } catch (\Exception $e) {
            // @todo logging
            return collect();
        }

        // Attach a colour to each bullet point in sequence
        $bulletPoints = $bulletPoints->map(function ($bulletPoint) {
            $bulletPoint->colour = $this->getNextColour();
            return $bulletPoint;
        });

        // Reset the colour sequence
        $this->resetColour();

        // Return the bullet points
        return $bulletPoints;
    }
}
