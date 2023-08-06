<?php

namespace App\Facades\Cms;

use App\Services\Cms\ProjectService;
use Illuminate\Support\Facades\Facade;

class Projects extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ProjectService::class;
    }
}