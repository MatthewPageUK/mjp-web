<?php

namespace App\Http\Livewire\Ui\Post;

use App\Facades\Settings;
use App\Facades\Ui\Posts;
use App\Http\Livewire\Ui\Traits\HasCategoryFilter;
use App\Http\Livewire\Ui\Traits\HasSearchFilter;
use App\Http\Livewire\Ui\Traits\HasSkillFilter;
use App\Models\PostCategory;
use App\Services\SkillService;
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Posts category header.
 *
 */
class CategoryHeader extends Component
{
    use HasCategoryFilter;

    /**
     * Category ...
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
        $this->setCategories(Posts::getCategories());
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
     * Render the posts page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.posts.category-header');
    }

}
