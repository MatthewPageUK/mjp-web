<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\Projects;
use App\Http\Livewire\Cms\Traits\HasCrudActions;
use App\Http\Livewire\Cms\Traits\HasCrudModes;
use App\Models\Project;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Projects Editor component
 *
 * Shows a list of Projects with create, update, delete,
 * move up and down functions.
 *
 */

class ProjectsEditor extends Component
{
    use HasCrudModes;
    use HasCrudActions;

    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Project";

    /**
     * Variable name of the model on the component
     *
     * @var string
     */
    public $modelVar = "project";

    /**
     * Editable project.
     *
     * @var Project
     */
    public $project;

    /**
     * All projects
     *
     * @var array|Collection
     */
    public $projects = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'project.name' => 'required|string|min:2',
        'project.slug' => 'nullable',
        'project.description' => 'nullable',
        'project.github' => 'nullable',
        'project.website' => 'nullable',
        'project.last_active' => 'nullable|date',
        'project.active' => 'boolean',
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
        $this->setProjects();
        $this->setRequestMode($request);
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setProjects();
    }

    /**
     * Set the Projects
     *
     * @return void
     */
    public function setProjects()
    {
        $this->projects = Projects::getAll();
    }

    /**
     * Set the editable model for this component
     *
     */
    public function setModel($data = [])
    {
        $this->project = Projects::new($data);
    }

    /**
     * Get the model for ID
     *
     * @param int $id
     * @return mixed
     */
    public function getModel(int $id)
    {
        return Projects::get($id);
    }

    /**
     * Create a new Project from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->executeCreate(function () {
            $this->project = Projects::create($this->project->toArray());
        });

        $this->setProjects();
    }

    /**
     * Delete the Project referenced by deleteId
     *
     * @return void
     */
    public function delete(): void
    {
        $this->executeDelete(function () {
            Projects::delete($this->project->id);
        });

        $this->setProjects();
    }

    /**
     * Save the changes to the Project
     *
     * @return void
     */
    public function save(): void
    {
        $this->executeSave(function () {
            Projects::update($this->project->id, $this->project->toArray());
        });

        $this->setProjects();
    }

    /**
     * Render the Projects page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.projects.index')
            ->layout(CmsLayout::class, ['title' => 'CMS - Projects']);
    }
}
