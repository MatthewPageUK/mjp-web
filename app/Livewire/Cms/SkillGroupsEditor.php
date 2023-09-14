<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\SkillGroups;

/**
 * CMS - Skill Groups Editor component
 *
 * Shows a list of Skills with add, edit, delete,
 */

class SkillGroupsEditor extends CrudAbstract
{
    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Skill Group";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = SkillGroups::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.skills.groups.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Skill Groups";

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
