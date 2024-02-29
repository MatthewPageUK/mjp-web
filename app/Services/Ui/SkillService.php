<?php

namespace App\Services\Ui;

use App\Models\Skill;
use App\Services\Traits\{
    HasActiveStatus,
    HasFilteredQuery,
};
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
    use HasFilteredQuery;

    /**
     * The model class to use.
     *
     * @var Model
     */
    public $model = Skill::class;

    /**
     * Get a single skill by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Skill
     */
    public function get(int $id): Skill
    {
        return $this->getBaseQuery()->findOrFail($id);
    }

    /**
     * Get all Skills
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()->orderBy('name')->get();
    }

    /**
     * Get recently used skills
     *
     * @param int $limit
     * @return Collection
     */
    public function getRecentlyUsed(int $limit): Collection
    {
        return $this->getBaseQuery()
            ->join('skill_stats', 'skills.id', '=', 'skill_stats.skill_id')
            ->with(['stats' => function ($query) {
                $query->where('key', 'last_used');
            }])
            ->orderBy('skill_stats.value', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get filtered list of skills
     *
     * @param array $filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        return $this->getFilteredQuery($filters)->orderBy('name')->get();
    }

    /**
     * Get demoable skills - active skills used in active demos.
     *
     * @return Collection
     */
    public function getDemoableSkills(): Collection
    {
        return $this->getAbleSkillsQuery('demos')->orderBy('name')->get();
    }

    /**
     * Get projectable skills - active skills used in active projects.
     *
     * @return Collection
     */
    public function getProjectableSkills(): Collection
    {
        return $this->getAbleSkillsQuery('projects')->orderBy('name')->get();
    }

    /**
     * Get postable skills - active skills used in active posts.
     *
     * @return Collection
     */
    public function getPostableSkills(): Collection
    {
        return $this->getAbleSkillsQuery('posts')->orderBy('name')->get();
    }

    /**
     * Get related active skills from the supplied relationship.
     *
     * @param string $relationship
     * @return Builder
     */
    protected function getAbleSkillsQuery($relationship): Builder
    {
        return $this->getBaseQuery()
            ->whereHas($relationship, function (Builder $query) {
                $query->active();
            });
    }

}
