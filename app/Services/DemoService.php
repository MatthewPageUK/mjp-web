<?php

namespace App\Services;

use App\Models\Demo;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
};

/**
 * Service for managing Demos.
 *
 */
class DemoService
{
    use HasActiveStatus;

    public $model = Demo::class;

    /**
     * Get a single demo by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return BulletPoint
     */
    public function get(int $id): Demo
    {
        return Demo::findOrFail($id);
    }

    /**
     * Get recent Demos
     *
     * @param int $count    How many to get
     * @return Collection
     */
    public function getRecent(int $count = 5): Collection
    {
        return $this->getBaseQuery()
            ->orderBy('created_at', 'desc')
            ->limit($count)
            ->get();
    }

    /**
     * Get all Demos
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Demo::orderBy('name')->get();
    }

    public function getFiltered(array $filters)
    {
        return $this->getFilteredQuery($filters)->get();
    }

    /**
     * Get filtered Demos
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
        $query->orderBy('created_at', 'desc');

        return $query;
    }

}
