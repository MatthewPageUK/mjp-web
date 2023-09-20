<?php

namespace App\Services\Cms;

use App\Models\SkillJourney;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * CMS - Skill Journey Service.
 *
 * Service for managing Skill Journeys in the CMS.
 *
 */
class SkillJourneyService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = SkillJourney::class;

    /**
     * Get all models from skill
     *
     * @throws \Exception
     * @return Collection
     */
    public function getFromSkill($skill): Collection
    {
        return $skill->skillJourneys()
            ->orderBy('created_at', 'desc')
            ->get();
    }

}
