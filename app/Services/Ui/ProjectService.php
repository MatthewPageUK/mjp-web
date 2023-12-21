<?php

namespace App\Services\Ui;

use App\Models\Project;
use App\Services\Traits\HasActiveStatus;
use App\Services\Traits\HasFilteredQuery;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Projects.
 *
 */
class ProjectService
{
    use HasActiveStatus;
    use HasFilteredQuery;

    /**
     * The model class to use.
     *
     * @var Model
     */
    public $model = Project::class;

    /**
     * Get a single project by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return BulletPoint
     */
    public function get(int $id): Project
    {
        return $this->getBaseQuery()->findOrFail($id);
    }

    /**
     * Get all Projects
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()
            ->with(['skills', 'image'])
            ->orderBy('name')
            ->get();
    }

    /**
     * Get filtered list of projects
     *
     * @param array $filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        return $this->getFilteredQuery($filters)
            ->with(['skills', 'image'])
            ->orderBy('last_active', 'desc')
            ->get();
    }
}
