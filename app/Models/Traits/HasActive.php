<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait for models with an active status field.
 *
 */
trait HasActive
{
    /**
     * Active scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query): Builder
    {
        return $query->where('active', true);
    }

    /**
     * Inactive scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query): Builder
    {
        return $query->where('active', false);
    }

    /**
     * Is active?
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
