<?php

namespace App\Services\Ui;

use App\Models\SkillGroup;
use App\Services\Traits\HasActiveStatus;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
};

/**
 * Service for managing Skill Groups.
 *
 */
class SkillGroupService
{
    use HasActiveStatus;

    /**
     * The model class to use.
     *
     * @var Model
     */
    public $model = SkillGroup::class;

    /**
     * Get a single skill group by ID.
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return SkillGroup
     */
    public function get(int $id): SkillGroup
    {
        return $this->getBaseQuery()->findOrFail($id);
    }

    /**
     * Get all Skill Groups
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->getBaseQuery()->orderBy('name')->get();
    }

    /**
     * Get skill groups with an active skill
     *
     * @return Collection
     */
    public function getActiveGroups(): Collection
    {
        return $this->getBaseQuery()
            ->whereHas('skills', function (Builder $query) {
                $query->active();
            })->get();
    }

}
