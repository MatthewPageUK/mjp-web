<?php

namespace App\Facades\Cms;

use App\Services\Cms\BulletPointService;
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