<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\Projects;

/**
 * CMS - Projects Editor component
 *
 * Shows a list of Projects with create, update, delete,
 * move up and down functions.
 *
 */

class ProjectsEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Project";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Projects::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.projects.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Projects";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.slug' => 'nullable',
        'model.description' => 'nullable',
        'model.website' => 'nullable',
        'model.last_active' => 'nullable|date',
        'model.active' => 'boolean',
    ];

}
