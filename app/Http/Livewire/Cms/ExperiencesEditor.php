<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Cms\Experiences;
use App\Http\Livewire\Cms\Traits\HasCrudActions;
use App\Http\Livewire\Cms\Traits\HasCrudModes;
use App\Models\Experience;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Experiences Editor component
 *
 * Shows a list of Experiences with create, update, delete,
 * move up and down functions.
 *
 */

class ExperiencesEditor extends Component
{
    use HasCrudModes;
    use HasCrudActions;

    /**
     * Readable name of the model
     *
     * @var string
     */
    public $modelName = "Experience";

    /**
     * Variable name of the model on the component
     *
     * @var string
     */
    public $modelVar = "experience";

    /**
     * Editable experience.
     *
     * @var Experience
     */
    public $experience;

    /**
     * All experiences
     *
     * @var array|Collection
     */
    public $experiences = [];

    /**
     * Validation rules
     *
     * @var array
     */
    public $rules = [
        'experience.name' => 'required|string|min:2',
        'experience.slug' => 'nullable',
        'experience.description' => 'nullable',
        'experience.start' => 'nullable|date',
        'experience.end' => 'nullable|date',
        'experience.active' => 'boolean',
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
        $this->setExperiences();
        $this->setRequestMode($request);
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setExperiences();
    }

    /**
     * Set the Experiences
     *
     * @return void
     */
    public function setExperiences()
    {
        $this->experiences = Experiences::getAll();
    }

    /**
     * Set the editable model for this component
     *
     */
    public function setModel($data = [])
    {
        $this->experience = Experiences::new($data);
    }

    /**
     * Get the model for ID
     *
     * @param int $id
     * @return mixed
     */
    public function getModel(int $id)
    {
        return Experiences::get($id);
    }

    /**
     * Create a new Experience from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->executeCreate(function () {
            $this->experience = Experiences::create($this->experience->toArray());
        });

        $this->setExperiences();
    }

    /**
     * Delete the Experience referenced by deleteId
     *
     * @return void
     */
    public function delete(): void
    {
        $this->executeDelete(function () {
            Experiences::delete($this->experience->id);
        });

        $this->setExperiences();
    }

    /**
     * Save the changes to the Experience
     *
     * @return void
     */
    public function save(): void
    {
        $this->executeSave(function () {
            Experiences::update($this->experience->id, $this->experience->toArray());
        });

        $this->setExperiences();
    }

    /**
     * Render the Experiences page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.experiences.index')
            ->layout(CmsLayout::class, ['title' => 'CMS - Experiences']);
    }
}
