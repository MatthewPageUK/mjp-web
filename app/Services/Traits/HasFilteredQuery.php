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
    public function getFilteredQuery(array $filters = []): Builder
    {
        $query = $this->getBaseQuery();
        $query = $this->applySkillFilter($query, $filters);
        $query = $this->applySkillGroupFilter($query, $filters);
        $query = $this->applyPostCategoryFilter($query, $filters);
        $query = $this->applySearchFilter($query, $filters);

        return $query;
    }

    /**
     * Apply search filter
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applySearchFilter(Builder $query, array $filters): Builder
    {
        if (isset($filters['search']) && $filters['search']) {
            $query->where(function (Builder $query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('content', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query;
    }

    /**
     * Apply post category filter
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applyPostCategoryFilter(Builder $query, array $filters): Builder
    {
        if (isset($filters['postCategory']) && $filters['postCategory']) {
            $query = $this->applyRelationshipFilter($query, 'postCategories', $filters['postCategory']);
        }

        return $query;
    }

    /**
     * Apply skill group filter
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applySkillGroupFilter(Builder $query, array $filters): Builder
    {
        if (isset($filters['skillGroup']) && $filters['skillGroup']) {
            $query = $this->applyRelationshipFilter($query, 'skillGroups', $filters['skillGroup']);
        }

        return $query;
    }

    /**
     * Apply skill filter
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applySkillFilter(Builder $query, array $filters): Builder
    {
        if (isset($filters['skill']) && $filters['skill']) {
            $query = $this->applyRelationshipFilter($query, 'skills', $filters['skill']);
        }

        return $query;
    }

    /**
     * Apply a relationship filter
     *
     * @param Builder $query
     * @param string $relationship
     * @param string $slug
     */
    public function applyRelationshipFilter(Builder $query, string $relationship, string $slug): Builder
    {
        $query->whereHas($relationship, function (Builder $query) use ($slug) {
            $query->active()->where('slug', $slug);
        });

        return $query;
    }
}