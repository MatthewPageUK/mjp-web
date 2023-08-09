<?php

namespace App\Services\Ui;

use App\Models\Project;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
};

/**
 * Service for managing Projects.
 *
 */
class ProjectService
{
    use HasActiveStatus;

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
        return Project::findOrFail($id);
    }

    /**
     * Get recent Projects
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

    /**
     * Get all Projects
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Project::orderBy('name')->get();
    }

    public function getFiltered(array $filters)
    {
        return $this->getFilteredQuery($filters)->get();
    }

    /**
     * Get filtered Projects
     *
     * @param array $filters    Array of filters
     *                          [
     *                              'skill' => string
     *                          ]
     * @return Collection
     */
    public function getFilteredQuery(array $filters): Builder
    {
        // Base query
        $query = $this->getBaseQuery();

        // Skill filter
        if (isset($filters['skill']) && $filters['skill']) {
            $query->whereHas('skills', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['skill']);
            });
        }

        // Order
        $query->orderBy('last_active', 'desc');

        return $query;
    }

}
