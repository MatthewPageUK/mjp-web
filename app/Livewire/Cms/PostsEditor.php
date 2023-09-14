<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\Posts;

/**
 * CMS - Posts Editor component
 *
 * Shows a list of Posts with add, edit, delete,
 */

class PostsEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Post";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Posts::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.posts.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Posts";

    /**
     * Rules for creating and editing posts
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'model.name' => 'required|string|min:2',
            'model.slug' => 'required',
            'model.snippet' => 'nullable',
            'model.content' => 'required',
            'model.active' => 'boolean',
        ];
    }

}
