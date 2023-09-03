<?php

namespace App\Facades\Cms;

use App\Services\Cms\PostService;
use Illuminate\Support\Facades\Facade;

class Posts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PostService::class;
    }
}