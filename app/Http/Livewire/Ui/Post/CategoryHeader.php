<?php

namespace App\Http\Livewire\Ui\Post;

use App\Facades\Ui\Posts;
use App\Http\Livewire\Ui\Traits\HasPostCategoryFilter;
use App\Models\PostCategory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Posts category header.
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
     * @return void
     */
    public function mount($category = null)
    {
        $this->setCategories(
            Posts::getCategories()
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
