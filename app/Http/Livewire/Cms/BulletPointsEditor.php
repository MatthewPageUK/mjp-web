<?php

namespace App\Http\Livewire\Cms;

use App\Facades\BulletPoints;
use App\View\Components\CmsLayout;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Bullet Points Editor component
 *
 * Shows a list of Bullet Points with add, edit, delete,
 * move up and down functions.
 *
 * Depends heavily on app/Services/BulletPointService.php
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
 * @method void move(string $direction, int $id)
 */

class BulletPointsEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * ID of bullet point to be deleted
     *
     * @var int
     */
    public $deleteId;

    /**
     * Title of the bullet to be deleted
     *
     * @var string
     */
    public $deleteTitle;

    /**
     * ID of the bullet to edit
     *
     * @var int
     */
    public $editId;

    /**
     * All bullet points
     *
     * @var array|Collection
     */
    public $points = [];

    /**
     * New / edited title
     *
     * @var string
     */
    public $newTitle = '';

    /**
     * New / edited position
     *
     * @var string
     */
    public $newPosition = 0;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->points = BulletPoints::getAllWithColour();
    }

    /**
     * Rules for creating and editing bullet points
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'newTitle' => 'required|string|min:2',
            'newPosition' => 'required|integer',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'newTitle.required' => 'Please enter a title for the bullet point',
            'newTitle.string' => 'The title must be a string',
            'newTitle.min' => 'The title must be at least 2 characters long',
            'newPosition.required' => 'Please enter a position for the new bullet point',
            'newPosition.integer' => 'The position must be an integer',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->points = BulletPoints::getAllWithColour();
    }

    /**
     * Show the form to add a new Bullet Point
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
    }

    /**
     * Create a new Bullet Point from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->validate();

        try {

            $bulletPoint = BulletPoints::create([
                'title' => $this->newTitle,
                'order' => $this->newPosition,
            ]);

            session()->flash('success', 'Created new Bullet Point - ' . $bulletPoint->title);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Bullet Point ' . $e->getMessage());
            return;
        }

        $this->points = BulletPoints::getAllWithColour();
        $this->cancelAdd();
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->newTitle = '';
        $this->newPosition = 0;
    }

    /**
     * Show the confirmation dialog for deleting a Bullet Point
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        try {
            $bullet = BulletPoints::get($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Bullet Point ' . $e->getMessage());
            return;
        }

        $this->mode = 'delete';
        $this->deleteId = $id;
        $this->deleteTitle = $bullet->title;
    }

    /**
     * Delete the Bullet Point referenced by deleteId
     *
     * @return void
     */
    public function delete(): void
    {
        try {

            BulletPoints::delete($this->deleteId);
            $this->points = BulletPoints::getAllWithColour();

            session()->flash('success', 'Deleted Bullet Point - '.$this->deleteTitle);

        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting Bullet Point '.$e->getMessage());
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
        $this->deleteId = null;
        $this->deleteTitle = '';
    }

    /**
     * Show the form to edit a Bullet Point
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        try {
            $bullet = BulletPoints::get($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Bullet Point ' . $e->getMessage());
            return;
        }

        $this->mode = 'edit';
        $this->editId = $id;
        $this->newTitle = $bullet->title;
        $this->newPosition = $bullet->order;
    }

    /**
     * Save the changes to the Bullet Point
     *
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        try {

            BulletPoints::update($this->editId, [
                'title' => $this->newTitle,
                'order' => (int) $this->newPosition,
            ]);

            $this->points = BulletPoints::getAllWithColour();

            session()->flash('success', 'Updated Bullet Point - '.$this->newTitle);

        } catch (\Exception $e) {
            session()->flash('error', 'Error updating Bullet Point '.$e->getMessage());
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
        $this->newTitle = '';
        $this->newPosition = 0;
    }

    /**
     * Move the Bullet Point up or down
     *
     * @param string $direction     up|down
     * @param int $id
     * @return void
     */
    public function move(string $direction, int $id): void
    {
        try {
            if ($direction == 'up') {
                BulletPoints::moveUp($id);
            } else {
                BulletPoints::moveDown($id);
            }

            $this->points = BulletPoints::getAllWithColour();

        } catch (\Exception $e) {
            session()->flash('error', 'Error moving Bullet Point '.$e->getMessage());
        }
    }

    /**
     * Render the Bullet Points page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.bullet-points.index')
            ->layout(CmsLayout::class);
    }
}
