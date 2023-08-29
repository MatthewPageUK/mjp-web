<?php

namespace App\Services\Cms;

use App\Models\Demo;

/**
 * CMS - Demo Service.
 *
 * Service for managing Demos in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class DemoService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Demo::class;

}
