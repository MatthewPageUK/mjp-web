<?php

namespace App\Services\Cms;

use App\Models\Experience;

/**
 * Service for managing Experiences in the CMS.
 *
 */
class ExperienceService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Experience::class;

}
