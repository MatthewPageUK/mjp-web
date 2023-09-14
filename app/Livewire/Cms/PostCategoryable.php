<?php

namespace App\Livewire\Cms;

use App\Models\PostCategory;
use App\Models\SkillGroup;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Post Category selection panel for any model
 * with the Post Categories
 *
 */

class PostCategoryable extends Component
{
    /**
     * The current Post model
     *
     * @var Post
     */
    public $post;

    /**
     * All Post Categories
     *
     * @var array|Collection
     */
    public $categories = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->categories = PostCategory::with('posts')->orderBy('name')->get();
    }

    public function toggleCategory(int $categoryId)
    {
        if ($this->post->postCategories->contains($categoryId)) {
            $this->post->postCategories()->detach($categoryId);
        } else {
            $this->post->postCategories()->attach($categoryId);
        }

        $this->post->refresh();
    }

    /**
     * Render the Post Category Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.posts.category-select');
    }
}
