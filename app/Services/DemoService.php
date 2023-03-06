<?php

namespace App\Services;

use App\Models\Demo;
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
    /**
     * Get only active Demos
     *
     * @var bool
     */
    public bool $activeOnly = true;

    /**
     * Get the base query
     *
     * @return Builder
     */
    private function getBaseQuery(): Builder
    {
        return $this->activeOnly ? Demo::active() : Demo::query();
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
        return $this->getBaseQuery()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get filtered Demos
     *
     * @param array $filters    Array of filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        // Base query
        $query = $this->getBaseQuery();

        // Skill filter
        if (isset($filters['skill']) && $filters['skill']) {
            $query->whereHas('skills', function (Builder $query) use ($filters) {
                $query->where('id', $filters['skill']);
            });
        }

        // Order
        $query->orderBy('created_at', 'desc');

        // Get and return Collection
        return $query->get();
    }

}
