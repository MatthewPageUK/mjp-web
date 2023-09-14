<?php

namespace App\Livewire\Ui\Post;

use App\Facades\Settings;
use App\Facades\Ui\Posts;
use App\Livewire\Ui\Traits\HasPostCategoryFilter;
use App\Livewire\Ui\Traits\HasSearchFilter;
use App\Livewire\Ui\Traits\HasSkillFilter;
use App\Models\PostCategory;
use App\Services\SkillService;
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Posts Homepage component
 *
 */
class Category extends Component
{
    use WithPagination;
    use HasSearchFilter;
    use HasSkillFilter;
    use HasPostCategoryFilter;

    /**
     * Posts to show
     *
     * @var Collection
     */
    public Collection $posts;

    /**
     * Recent category posts
     *
     * @var array
     */
    public array $recentCategoryPosts = [];

    /**
     * Selected category
     *
     * @var PostCategory
     */
    public ?PostCategory $category = null;

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount(?PostCategory $category = null)
    {
        $this->populatePosts();
        $this->setCategories(Posts::getCategories());

        foreach ($this->categories as $category) {
            $this->recentCategoryPosts[$category->slug] = Posts::getRecent(6, $category->slug);
        }
    }

    /**
     * Populate the experiencs list
     *
     * @return void
     */
    private function populatePosts(): void
    {
        if ($this->category) {
            $this->posts = Posts::getRecent(12, $this->category->slug);
        } else {
            $this->posts = Posts::getRecent(12);
        }

    }

    /**
     * Render the posts page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.posts.posts')
            ->layout(UiLayout::class, [
                'title' => 'Posts',
            ]);
    }

}
