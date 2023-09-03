<?php

namespace App\Facades\Cms;

use App\Services\Cms\SkillService;
use Illuminate\Support\Facades\Facade;

class Skills extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SkillService::class;
    }
}