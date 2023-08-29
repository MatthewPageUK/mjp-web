<?php

namespace App\Facades\Ui;

use App\Services\Ui\SkillGroupService;
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