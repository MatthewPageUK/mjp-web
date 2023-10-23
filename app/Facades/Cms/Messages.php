<?php

namespace App\Facades\Cms;

use App\Services\Cms\MessageService;
use Illuminate\Support\Facades\Facade;

class Messages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MessageService::class;
    }
}