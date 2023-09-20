<?php

namespace App\Facades\Cms;

use App\Services\Cms\SkillJourneyService;
use Illuminate\Support\Facades\Facade;

class SkillJourneys extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SkillJourneyService::class;
    }
}