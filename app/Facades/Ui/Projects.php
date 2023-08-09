<?php

namespace App\Facades\Ui;

use App\Services\Ui\ProjectService;
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