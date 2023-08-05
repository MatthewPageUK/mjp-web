<?php

namespace App\Facades\Cms;

use App\Services\Cms\DemoService;
use Illuminate\Support\Facades\Facade;

class Demos extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DemoService::class;
    }
}