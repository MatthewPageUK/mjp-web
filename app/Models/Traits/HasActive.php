<?php

namespace App\Models\Traits;

trait HasActive
{
    /**
     * Active scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Inactive scope
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
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