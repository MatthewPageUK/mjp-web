<?php

namespace App\Facades\Ui;

use App\Services\Ui\PostService;
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