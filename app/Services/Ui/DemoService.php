<?php

namespace App\Services\Ui;

use App\Models\Demo;
use App\Services\Traits\{
    HasActiveStatus,
    HasFilteredQuery,
};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Service for retrieving Demos for use in the UI.
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
     * @return Model
     */
    public function get(int $id): Model
    {
        $demo = $this
            ->getBaseQuery()
            ->findOrFail($id);

        return $demo;
    }

    /**
     * Get all active demos.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        $demos = $this
            ->getBaseQuery()
            ->orderBy('name')
            ->get();

        return $demos;
    }

    /**
     * Get filtered list of demos
     *
     * @param array $filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        $demos = $this
            ->getFilteredQuery($filters)
            ->latest()
            ->get();

        return $demos;
    }

}
