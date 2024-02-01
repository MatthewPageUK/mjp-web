<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Model services with an active status.
 *
 * @property bool $activeOnly
 * @method Builder active()
 */
trait HasActiveStatus
{
    /**
     * Get only active models
     *
     * @var bool
     */
    public bool $activeOnly = true;

    /**
     * Get the base query
     *
     * @return Builder
     */
    public function getBaseQuery(): Builder
    {
        return $this->activeOnly ? $this->model::active() : $this->model::query();
    }
}