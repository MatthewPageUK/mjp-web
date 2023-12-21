<?php

namespace App\Livewire\Ui\Post;

use App\Livewire\Ui\Traits\HasPostCategoryFilter;
use App\Models\PostCategory;
use App\Services\Ui\PostService;
use Illuminate\View\View;
use Livewire\Component;

/**
 * UI - Posts category header.
 *
 */
class CategoryHeader extends Component
{
    use HasPostCategoryFilter;

    /**
     * Current category
     *
     * @var PostCategory
     */
    public ?PostCategory $category = null;

    /**
     * Mount the component and populate the data
     *
     * @param PostService $postService
     * @param string $category
     * @return void
     */
    public function mount(PostService $postService, $category = null)
    {
        $this->setCategories(
            $postService->getCategories()
        );
    }

    /**
     * Is the supplied category the current one?
     *
     * @param PostCategory $category
     * @return boolean
     */
    public function isCurrentCategory(PostCategory $category): bool
    {
        return $this->category && $this->category->id === $category->id;
    }

    /**
     * Render the category header
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.posts.category-header');
    }

}
