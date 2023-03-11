<?php

namespace App\Services;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Experiences.
 *
 */
class ExperienceService
{

    // /**
    //  * Get only active Experiences
    //  *
    //  * @var bool
    //  */
    // public bool $activeOnly = true;

    // /**
    //  * Get the base query
    //  *
    //  * @return Builder
    //  */
    // private function getBaseQuery(): Builder
    // {
    //     return $this->activeOnly ? Experience::active() : Experience::query();
    // }

    /**
     * Get recent projects
     *
     * @param int $count    How many to get
     * @return Collection
     */
    public function getRecent(int $count = 5): Collection
    {
        return Project::active()
            ->orderBy('last_active', 'desc')
            ->limit($count)
            ->get();
    }

}
