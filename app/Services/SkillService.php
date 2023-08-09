<?php

namespace App\Services;

use App\Exceptions\Skills\NoSkillsFound;
use App\Exceptions\Skills\SkillNotFound;
use App\Models\Skill;
use App\Models\SkillGroup;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Skills.
 *
 */
class SkillService
{
    use HasActiveStatus;

    public $model = Skill::class;
    // /**
    //  * Get only active Skills
    //  *
    //  * @var bool
    //  */
    // public bool $activeOnly = true;

    // /**
    //  * Get the base query
    //  *
    //  * @return Builder
    //  */
    // private function getBaseQuery(): Builder
    // {
    //     return $this->activeOnly ? Skill::active() : Skill::query();
    // }

    /**
     * Get a Skill by its slug
     *
     * @param string $slug
     * @throws SkillNotFound
     * @return Skill
     */
    public function getSkill(string $slug): Skill
    {
        $skill = Skill::find($slug);

        if (! $skill) {
            throw new SkillNotFound($slug);
        }

        return $skill;
    }

    /**
     * Get 10 Top Skills
     *
     * @param string|null $group   Limit to this group only
     * @return Collection
     */
    public function getTop10(?string $group = null): Collection
    {
        $query = $this->getBaseQuery();

        if ($group) {
            $query->inGroup($group);
        }

        $query->orderBy('level', 'desc')
            ->limit(10);

        $skills = $query->get();

        if ($skills->count() < 1) {
            throw new NoSkillsFound();
        }

        return $skills;
    }

    /**
     * Get filtered Skills
     *
     * @param array $filters    Array of filters
     * @return Collection
     */
    public function getFiltered(array $filters): Collection
    {
        // Base query
        $query = $this->getBaseQuery();

        // Group filter
        if (isset($filters['group']) && $filters['group']) {
            $query->whereRelation('skillGroups', 'slug', $filters['group']);
        }

        // Order skills by level, highest first.
        $query->orderBy('level', 'desc');

        // Get and return Collection
        return $query->get();
    }

    /**
     * Get active skill groups
     *
     * @return
     */
    public function getSkillGroups()
    {
        return SkillGroup::whereHas('skills', function (Builder $query) {
            $query->active();
        })->get();
    }

    /**
     * Get all skills that have a Demo
     *
     * @return Collection
     */
    public function getDemoableSkills(): Collection
    {
        return Skill::whereHas('demos')->get();
    }

    /**
     * Get all skills that have a Project
     *
     * @return Collection
     */
    public function getProjectableSkills(): Collection
    {
        return Skill::whereHas('projects')->get();
    }


    public function getFilteredQuery(array $filters)
    {
        // Base query
        $query = $this->getBaseQuery();

        // Group filter
        if (isset($filters['group']) && $filters['group']) {
            $query->whereRelation('skillGroups', 'slug', $filters['group']);
        }

        // Order skills by level, highest first.
        $query->orderBy('level', 'desc');

        // Get and return Collection
        return $query;
    }

}
