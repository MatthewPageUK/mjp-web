<?php

namespace App\Facades\Ui;

use App\Services\Ui\SkillService;
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