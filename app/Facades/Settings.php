<?php

namespace App\Facades;

use App\Services\SettingService;
use Illuminate\Support\Facades\Facade;

class Settings extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SettingService::class;
    }
}