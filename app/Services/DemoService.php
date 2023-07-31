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
     *                          [
     *                              'skill' => string
     *                          ]
     * @return Collection
     */
    public function getFilteredQuery(array $filters)
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
