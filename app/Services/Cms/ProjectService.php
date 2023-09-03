<?php

namespace App\Services\Cms;

use App\Models\Project;

/**
 * CMS - Project Service.
 *
 * Service for managing Projects in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class ProjectService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Project::class;

}
