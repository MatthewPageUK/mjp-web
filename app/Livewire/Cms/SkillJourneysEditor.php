<?php

namespace App\Livewire\Cms;

use App\Enums\CrudModes;
use App\Facades\Cms\SkillJourneys;
use Illuminate\Http\Request;

/**
 * CMS - Skill Journeys Editor component
 *
 * Shows a list of Skills Journeys with add, edit, delete.
 *
 * Embedded into the Skills edit form
 *
 */

class SkillJourneysEditor extends CrudAbstract
{
    /**
     * The current skill
     *
     * @var Skill
     */
    public $skill;

    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Skill Journey";

    /**
     * The service facade to use for CRUD operations
     *
     * @var string
     */
    public $service = SkillJourneys::class;

    /**
     * The view used to render the CMS page.
     *
     * @var string
     */
    public $view = "cms.skills.journeys.index";

    /**
     * Title of the CMS Page
     *
     * @var string
     */
    public $title = "CMS - Skill Journeys";

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'model.name' => 'required|string|min:2',
        'model.created_at' => 'nullable',
        'model.completed_at' => 'nullable'
    ];

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->setModel();
        $this->setList();
        $this->setMode(CrudModes::Read);
        $this->setModel();
    }

    /**
     * Set the model list
     *
     * @return void
     */
    public function setList(): void
    {
        $this->list = $this->service::getFromSkill($this->skill);
    }

    /**
     * Create a new model from the details
     * in the form. - Overide to set skill id
     *
     * @return void
     */
    public function create(): void
    {
        $this->model->skill_id = $this->skill->id;

        $this->executeCreate(function () {
            $this->model = $this->service::create($this->model->toArray());
        });

        $this->setList();
    }

    /**
     * Render the CMS page
     *
     * @return View
     */
    public function render()
    {
        return view($this->view);
    }
}
