<?php

namespace App\Services;

use App\Models\Project;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Projects.
 *
 */
class ProjectService
{
    use HasActiveStatus;

    public $model = Project::class;

    /**
     * Get recent projects
     *
     * @param int $count    How many to get
     * @return Collection
     */
    public function getRecent(int $count = 5): Collection
    {
        return $this->getBaseQuery()
            ->orderBy('last_active', 'desc')
            ->limit($count)
            ->get();
    }

}
