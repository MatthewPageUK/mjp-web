<?php

namespace App\Http\Livewire\Cms;

use App\Models\Skill;
use App\Models\SkillGroup;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Skill Groups Editor component
 *
 * Shows a list of Skills with add, edit, delete,
 * move up and down functions.
 *
 * Depends heavily on app/Services/SkillService.php
 *
 * @method void mount()
 * @method array rules()
 * @method array messages()
 * @method void hydrate()
 * @method void add()
 * @method void create()
 * @method void cancelAdd()
 * @method void confirmDelete(int $id)
 * @method void delete()
 * @method void cancelDelete()
 * @method void edit(int $id)
 * @method void save()
 * @method void cancelEdit()
 */

class SkillGroupsEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Editable Skill Group
     *
     * @var Skill
     */
    public $group;

    /**
     * All groups
     *
     * @var array|Collection
     */
    public $groups = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->group = new SkillGroup();
        $this->groups = SkillGroup::all();

        if ($request->mode === 'create') {
            $this->add();
        } elseif ($request->mode === 'edit') {
            $this->edit($request->id);
        } elseif ($request->mode === 'delete') {
            $this->confirmDelete($request->id);
        }
    }

    /**
     * Rules for creating and editing groups
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'group.name' => 'required|string|min:2',
            'group.slug' => 'required',
            'group.description' => 'nullable',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->groups = SkillGroup::all();
    }

    /**
     * Show the form to add a new Group
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
        $this->group = new SkillGroup(['active' => 1]);
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

            $this->group->save();

            session()->flash('success', 'Created new Group - ' . $this->group->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Group ' . $e->getMessage());
            return;
        }

        $this->groups = SkillGroup::all();
        //$this->cancelAdd();

        // Edit the new Skill
        $this->edit($this->group->id);
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->group = new SkillGroup();
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
            $this->group = SkillGroup::find($id);

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

            $this->group->delete();
            $this->groups = SkillGroup::all();

            session()->flash('success', 'Deleted Skill - '.$this->group->name);

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
        $this->group = new SkillGroup();
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
            $this->group = SkillGroup::find($id);

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

            $this->group->save();
            $this->groups = SkillGroup::all();

            session()->flash('success', 'Updated Skill - '.$this->group->name);

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
        $this->group = new SkillGroup();
    }

    /**
     * Render the Skills page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.skills.groups')
            ->layout(CmsLayout::class);
    }
}
