<?php

namespace App\Services;

use App\Models\Masthead;
use App\Models\Skill;
use App\Models\SkillGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service for managing Mastheads.
 *
 */
class SkillService
{
    /**
     * Get 10 Top Skills
     *
     * @param int|string|null $group   Limit to this group
     * @return Collection
     */
    public function getTop10(int|string $group = null): Collection
    {
        if ($group) {
            return Skill::active()
                ->whereHas('skillGroups', function (Builder $query) use ($group) {
                    $query->where('skill_groups.id', $group);
                })
                ->orderBy('level', 'desc')
                ->limit(10)
                ->get();
        }

        return Skill::active()
            ->orderBy('level', 'desc')
            ->limit(10)
            ->get();
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

}
