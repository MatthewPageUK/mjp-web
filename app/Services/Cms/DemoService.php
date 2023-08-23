<?php

namespace App\Services\Cms;

use App\Models\Demo;

/**
 * Service for managing Demos in the CMS.
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
