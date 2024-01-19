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
     * Get all bullet points in order with a rainbow colour
     * attached as $model->colour.
     *
     * @throws \Exception
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            $bulletPoints =  BulletPoint::orderBy('order')->get();
        } catch (\Exception $e) {
            return collect();
        }

        $bulletPoints = $this->attachRainbowColour($bulletPoints);

        return $bulletPoints;
    }

    /**
     * Attach a rainbow colour to each bullet point.
     *
     * @param Collection $bulletPoints
     * @return Collection
     */
    public function attachRainbowColour(Collection $bulletPoints): Collection
    {
        $this->resetColour();

        return $bulletPoints->map(function ($bulletPoint) {
            $bulletPoint->colour = $this->getNextColour();
            return $bulletPoint;
        });
    }
}
