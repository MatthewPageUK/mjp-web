<?php

namespace App\Http\Livewire\Cms;

use App\Models\Post;
use App\Models\PostCategory;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Posts Editor component
 *
 * Shows a list of Posts with add, edit, delete,
 * move up and down functions.
 *
 * Depends heavily on app/Services/PostService.php
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

class PostCategoriesEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Editable Post Category
     *
     * @var Post
     */
    public $category;

    /**
     * All categories
     *
     * @var array|Collection
     */
    public $categories = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->category = new PostCategory();
        $this->categories = PostCategory::all();

        if ($request->mode === 'create') {
            $this->add();
        } elseif ($request->mode === 'edit') {
            $this->edit($request->id);
        } elseif ($request->mode === 'delete') {
            $this->confirmDelete($request->id);
        }
    }

    /**
     * Rules for creating and editing categories
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category.name' => 'required|string|min:2',
            'category.slug' => 'required',
            'category.description' => 'nullable',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->categories = PostCategory::all();
    }

    /**
     * Show the form to add a new Category
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
        $this->category = new PostCategory(['active' => 1]);
    }

    /**
     * Create a new Post from the details
     * in the form.
     *
     * @return void
     */
    public function create(): void
    {
        $this->validate();

        try {

            $this->category->save();

            session()->flash('success', 'Created new Category - ' . $this->category->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Category ' . $e->getMessage());
            return;
        }

        $this->categories = PostCategory::all();
        //$this->cancelAdd();

        // Edit the new Post
        $this->edit($this->category->id);
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->category = new PostCategory();
    }

    /**
     * Show the confirmation dialog for deleting a Post
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete(int $id): void
    {
        try {
            $this->category = PostCategory::find($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Post ' . $e->getMessage());
            return;
        }

        $this->mode = 'delete';
    }

    /**
     * Delete the Post
     *
     * @return void
     */
    public function delete(): void
    {
        try {

            $this->category->delete();
            $this->categories = PostCategory::all();

            session()->flash('success', 'Deleted Post - '.$this->category->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting Post '.$e->getMessage());
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
        $this->category = new PostCategory();
    }

    /**
     * Show the form to edit a Post
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id): void
    {
        try {
            $this->category = PostCategory::find($id);

        } catch (\Exception $e) {
            session()->flash('error', 'Error finding Post ' . $e->getMessage());
            return;
        }

        $this->mode = 'edit';
    }

    /**
     * Save the changes to the Post
     *
     * @return void
     */
    public function save(): void
    {
        $this->validate();

        try {

            $this->category->save();
            $this->categories = PostCategory::all();

            session()->flash('success', 'Updated Post - '.$this->category->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error updating Post '.$e->getMessage());
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
        $this->category = new PostCategory();
    }

    /**
     * Render the Posts page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.posts.categories')
            ->layout(CmsLayout::class);
    }
}
