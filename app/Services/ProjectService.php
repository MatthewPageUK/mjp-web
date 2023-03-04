<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Projects.
 *
 */
class ProjectService
{
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
