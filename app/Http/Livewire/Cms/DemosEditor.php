<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Demos;
use App\Models\Demo;
use App\Models\Skill;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Demos Editor component
 *
 * Shows a list of Demos with add, edit, delete,
 * move up and down functions.
 *
 * Depends heavily on app/Services/DemoService.php
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

class DemosEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Editable Demo
     *
     * @var Demo
     */
    public $demo;

    /**
     * All demos
     *
     * @var array|Collection
     */
    public $demos = [];

    /**
     * All skills
     *
     * @var array|Collection
     */
    public $skills = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->demo = new Demo();
        $this->demos = Demos::getAll();
        $this->skills = Skill::orderBy('name')->get();

        if ($request->mode === 'create') {
            $this->add();
        } elseif ($request->mode === 'edit') {
            $this->edit($request->id);
        } elseif ($request->mode === 'delete') {
            $this->confirmDelete($request->id);
        }
    }

    /**
     * Rules for creating and editing demos
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'demo.name' => 'required|string|min:2',
            'demo.slug' => 'nullable',
            'demo.description' => 'nullable',
            'demo.url' => 'nullable',
            'demo.demo_url' => 'nullable',
            'demo.active' => 'boolean',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->demos = Demos::getAll();
    }

    /**
     * Show the form to add a new Demo
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
        $this->demo = new Demo(['active' => 1]);
    }

    /**
     * Create a new Demo from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->validate();

        try {

            $this->demo->save();

            session()->flash('success', 'Created new Demo - ' . $this->demo->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Demo ' . $e->getMessage());
            return;
        }

        $this->demos = Demos::getAll();
        //$this->cancelAdd();

        // Edit the new Demo
        $this->edit($this->demo->id);
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->demo = new Demo();
    }

    /**
     * Show the confirmation dialog for deleting a Demo
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        try {
            $this->demo = Demos::get($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Demo ' . $e->getMessage());
            return;
        }

        $this->mode = 'delete';
    }

    /**
     * Delete the Demo
     *
     * @return void
     */
    public function delete(): void
    {
        try {

            $this->demo->delete();
            $this->demos = Demos::getAll();

            session()->flash('success', 'Deleted Demo - '.$this->demo->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting Demo '.$e->getMessage());
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
        $this->demo = new Demo();
    }

    /**
     * Show the form to edit a Demo
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        try {
            $this->demo = Demos::get($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Demo ' . $e->getMessage());
            return;
        }

        $this->mode = 'edit';
    }

    /**
     * Save the changes to the Demo
     *
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        try {

            $this->demo->save();
            $this->demos = Demos::getAll();

            session()->flash('success', 'Updated Demo - '.$this->demo->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error updating Demo '.$e->getMessage());
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
        $this->demo = new Demo();
    }

    /**
     * Render the Demos page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.demos.index')
            ->layout(CmsLayout::class);
    }
}
