<?php

namespace App\Http\Livewire\Cms;

use App\Models\Skill;
use App\Models\SkillGroup;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Skills Editor component
 *
 * Shows a list of Skills with add, edit, delete,
 * move up and down functions.
 *
 */

class SkillsEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Editable Skill
     *
     * @var Skill
     */
    public $skill;

    /**
     * All skills
     *
     * @var array|Collection
     */
    public $skills = [];

    public $groups;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->skill = new Skill();
        $this->setSkills();
        $this->setGroups();

        if ($request->mode === 'create') {
            $this->add();
        } elseif ($request->mode === 'edit') {
            $this->edit($request->id);
        } elseif ($request->mode === 'delete') {
            $this->confirmDelete($request->id);
        }
    }

    /**
     * Rules for creating and editing skills
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'skill.name' => 'required|string|min:2',
            'skill.slug' => 'required',
            'skill.description' => 'nullable',
            'skill.level' => 'required|between:0,10',
            'skill.svg' => 'nullable',
            'skill.active' => 'boolean',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        // $this->skills = Skill::all();
    }

    public function setSkills()
    {
        $this->skills = Skill::orderBy('name')->get();
    }

    public function setGroups()
    {
        $this->groups = SkillGroup::orderBy('name')
            ->with([
                'skills' => function ($query) {
                    $query->orderBy('name');
                }
            ])
            ->get();
    }

    /**
     * Show the form to add a new Skill
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
        $this->skill = new Skill(['active' => 1]);
    }

    /**
     * Create a new Skill from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->validate();

        try {

            $this->skill->save();

            session()->flash('success', 'Created new Skill - ' . $this->skill->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Skill ' . $e->getMessage());
            return;
        }

        $this->setSkills();
        $this->setGroups();

        // Edit the new Skill
        $this->edit($this->skill->id);
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->skill = new Skill();
    }

    /**
     * Show the confirmation dialog for deleting a Skill
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        try {
            $this->skill = Skill::find($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Skill ' . $e->getMessage());
            return;
        }

        $this->mode = 'delete';
    }

    /**
     * Delete the Skill
     *
     * @return void
     */
    public function delete(): void
    {
        try {

            // Note - see 'deleting' hook in Skill model
            $this->skill->delete();
            $this->setSkills();
            $this->setGroups();

            session()->flash('success', 'Deleted Skill - '.$this->skill->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting Skill '.$e->getMessage());
        }

        $this->cancelDelete();
    }

    /**
     * Cancel the delete operation and reset the form.
     *
     * @return void
     */
    public function cancelDelete(): void
    {
        $this->mode = 'view';
        $this->skill = new Skill();
    }

    /**
     * Show the form to edit a Skill
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        try {
            $this->skill = Skill::find($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Skill ' . $e->getMessage());
            return;
        }

        $this->mode = 'edit';
    }

    /**
     * Save the changes to the Skill
     *
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        try {

            $this->skill->save();
            $this->setSkills();
            $this->setGroups();

            session()->flash('success', 'Updated Skill - '.$this->skill->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error updating Skill '.$e->getMessage());
        }

        $this->cancelEdit();
    }

    /**
     * Cancel the edit operation and reset the form.
     *
     * @return void
     */
    public function cancelEdit(): void
    {
        $this->mode = 'view';
        $this->skill = new Skill();
    }

    /**
     * Render the Skills page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.skills.index')
            ->layout(CmsLayout::class);
    }
}
