<?php

namespace App\Facades\Ui;

use App\Services\Ui\ExperienceService;
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