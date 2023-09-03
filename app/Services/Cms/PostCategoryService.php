<?php

namespace App\Services\Cms;

use App\Models\PostCategory;

/**
 * CMS - Post Category Service.
 *
 * Service for managing Post Categories in the CMS.
 * Standard CRUD features and re-ordering.
 *
 */
class PostCategoryService extends AbstractCrudService
{
    /**
     * The model class to use.
     *
     * @var Model
     */
    protected $model = PostCategory::class;

}
