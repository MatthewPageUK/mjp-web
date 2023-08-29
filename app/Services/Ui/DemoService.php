<?php

namespace App\Services\Ui;

use App\Models\Demo;
use App\Services\Traits\{
    HasActiveStatus,
    HasFilteredQuery,
};
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Demos.
 *
 */
class DemoService
{
    use HasActiveStatus;
    use HasFilteredQuery;

    /**
     * The model class to use.
     *
     * @var Model
     */
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
        return $this->getBaseQuery()->findOrFail($id);
    }

    /**
     * Get all Demos
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()->orderBy('name')->get();
    }

    /**
     * Get filtered list of demos
     *
     * @param array $filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        return $this->getFilteredQuery($filters)
            ->orderBy('created_at', 'desc')
            ->get();
    }

}
