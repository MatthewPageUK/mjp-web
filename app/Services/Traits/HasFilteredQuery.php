<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasFilteredQuery
{
    /**
     * Get filtered Models query
     *
     * @param array $filters    Array of filters
     * @return Builder
     */
    public function getFilteredQuery(array $filters): Builder
    {
        // Base query
        $query = $this->getBaseQuery();

        // Skill filter
        if (isset($filters['skill']) && $filters['skill']) {
            $query->whereHas('skills', function (Builder $query) use ($filters) {
                $query->active()->where('slug', $filters['skill']);
            });
        }

        // Skill group filter
        if (isset($filters['skillGroup']) && $filters['skillGroup']) {
            $query->whereHas('skillGroups', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['skillGroup']);
            });
        }

        // Post Category filter
        if (isset($filters['postCategory']) && $filters['postCategory']) {
            $query->whereHas('postCategories', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['postCategory']);
            });
        }

        // Search filter
        if (isset($filters['search']) && $filters['search']) {
            $query->where(function (Builder $query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('content', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query;
    }
}