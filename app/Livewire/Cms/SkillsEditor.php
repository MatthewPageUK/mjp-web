<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\Skills;

/**
 * CMS - Skills Editor component
 *
 * Shows a list of Skills with add, edit, delete.
 *
 */

class SkillsEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Skill";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = Skills::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.skills.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Skills";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.slug' => 'required',
        'model.description' => 'nullable',
        'model.level' => 'required|between:0,10',
        'model.svg' => 'nullable',
        'model.active' => 'boolean',
    ];

}
