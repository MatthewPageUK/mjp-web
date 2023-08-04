<?php

namespace App\Http\Livewire\Cms;

use App\Models\Post;
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

class PostsEditor extends Component
{
    /**
     * Current mode (view|create|delete)
     *
     * @var string
     */
    public $mode = 'view';

    /**
     * Editable Post
     *
     * @var Post
     */
    public $post;

    /**
     * All posts
     *
     * @var array|Collection
     */
    public $posts = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->post = new Post();
        $this->posts = Post::all();

        if ($request->mode === 'create') {
            $this->add();
        } elseif ($request->mode === 'edit') {
            $this->edit($request->id);
        } elseif ($request->mode === 'delete') {
            $this->confirmDelete($request->id);
        }
    }

    /**
     * Rules for creating and editing posts
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'post.name' => 'required|string|min:2',
            'post.slug' => 'required',
            'post.snippet' => 'nullable',
            'post.content' => 'required',
            'post.active' => 'boolean',
        ];
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->posts = Post::all();
    }

    /**
     * Show the form to add a new Post
     *
     * @return void
     */
    public function add(): void
    {
        $this->mode = 'create';
        $this->post = new Post(['active' => 1]);
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

            $this->post->save();

            session()->flash('success', 'Created new Post - ' . $this->post->name);

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating Post ' . $e->getMessage());
            return;
        }

        $this->posts = Post::all();

        // Edit the new Post
        $this->edit($this->post->id);
    }

    /**
     * Cancel and reset the creation form.
     *
     * @return void
     */
    public function cancelAdd(): void
    {
        $this->mode = 'view';
        $this->post = new Post();
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
            $this->post = Post::find($id);

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

            // Note - see 'deleting' hook in Post model
            $this->post->delete();
            $this->posts = Post::all();

            session()->flash('success', 'Deleted Post - '.$this->post->name);

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
        $this->post = new Post();
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
            $this->post = Post::find($id);

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

            $this->post->save();
            $this->posts = Post::all();

            session()->flash('success', 'Updated Post - '.$this->post->name);

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
        $this->post = new Post();
    }

    /**
     * Render the Posts page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.posts.index')
            ->layout(CmsLayout::class);
    }
}
