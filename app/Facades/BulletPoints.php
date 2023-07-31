<?php

namespace App\Facades;

use App\Services\BulletPointService;
use Illuminate\Support\Facades\Facade;

class BulletPoints extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BulletPointService::class;
    }
}