<?php

namespace App\Facades\Ui;

use App\Services\Ui\DemoService;
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