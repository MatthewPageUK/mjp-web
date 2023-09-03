<?php

namespace App\Services\Cms;

use App\Models\Skill;

/**
 * CMS - Skill Service.
 *
 * Service for managing Skills in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class SkillService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Skill::class;

}
