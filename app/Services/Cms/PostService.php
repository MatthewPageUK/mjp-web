<?php

namespace App\Services\Cms;

use App\Models\Post;

/**
 * CMS - Post Service.
 *
 * Service for managing Posts in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class PostService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = Post::class;

}
