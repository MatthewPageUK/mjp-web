<?php

namespace App\Facades\Cms;

use App\Services\Cms\SkillGroupService;
use Illuminate\Support\Facades\Facade;

class SkillGroups extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SkillGroupService::class;
    }
}