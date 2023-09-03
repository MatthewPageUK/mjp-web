<?php

namespace App\Facades\Cms;

use App\Services\Cms\PostCategoryService;
use Illuminate\Support\Facades\Facade;

class PostCategories extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PostCategoryService::class;
    }
}