<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\PostCategories;

/**
 * CMS - Post Categories Editor component
 *
 * Shows a list of Posts with add, edit, delete
 *
 */

class PostCategoriesEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Post Category";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = PostCategories::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.posts.categories.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Post Categories";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.slug' => 'required',
        'model.description' => 'nullable',
    ];

}
