<?php

namespace App\Services\Ui;

use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\SkillGroup;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
};

/**
 * Service for managing Skills.
 *
 */
class SkillService
{
    use HasActiveStatus;

    public $model = Skill::class;

    /**
     * Get a single skill by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return BulletPoint
     */
    public function get(int $id): Skill
    {
        return Skill::findOrFail($id);
    }

    /**
     * Get recent Skills
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
     * Get all Skills
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Skill::orderBy('name')->get();
    }

    /**
     * Get skill categories with a skill
     *
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return SkillGroup::has('skills')->get();
    }

    public function getFiltered(array $filters)
    {
        return $this->getFilteredQuery($filters)->get();
    }

    /**
     * Get filtered Skills
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

        // Category filter
        if (isset($filters['category']) && $filters['category']) {
            $query->whereHas('skillGroups', function (Builder $query) use ($filters) {
                $query->where('slug', $filters['category']);
            });
        }

        // Order
        $query->orderBy('level', 'desc')
            ->orderBy('name', 'asc');

        return $query;
    }

}
