<?php

namespace App\Facades\Cms;

use App\Services\Cms\ExperienceService;
use Illuminate\Support\Facades\Facade;

class Experiences extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ExperienceService::class;
    }
}