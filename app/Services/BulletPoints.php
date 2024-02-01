<?php

namespace App\Services;

use App\Contracts\BulletPoints as BulletPointsContract;
use App\Contracts\RainbowColour;
use App\Models\BulletPoint;
use App\Services\Traits\WithRainbow;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

/**
 * UI - Bullet Point Service.
 *
 * Service for retrieving Bullet Points in the
 * frontend web site.
 *
 */
class BulletPoints implements BulletPointsContract, RainbowColour
{
    use WithRainbow;

    public function getAll(): Collection
    {
        try {
            $bulletPoints =  BulletPoint::orderBy('order')->get();
        } catch (\Exception $e) {
            Log::error('Error getting bullet points: ' . $e->getMessage());
            return collect();
        }

        return $bulletPoints;
    }

    public function getAllWithRainbow(): Collection
    {
        return $this->attachRainbowColour($this->getAll());
    }

}
