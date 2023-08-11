<?php

namespace App\Http\Livewire\Ui\Post;

use App\Facades\Page;
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
 * Posts Homepage component
 *
 */
class PostsHome extends Component
{
    use WithPagination;
    use HasSearchFilter;
    // use HasSkillFilter;
    use HasCategoryFilter;

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
     * Category ...
     *
     * @var PostCategory
     */
    public $category = null;

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
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
        foreach ($this->categories as $category) {
            $this->recentCategoryPosts[$category->slug] = Posts::getRecent(6, $category->slug);
        }

        if ($this->search) {
            $this->posts = Posts::getFilteredQuery([
                'search' => $this->search,
            ])->get();

            return;
        }

        $this->posts = Posts::getRecent(12);
    }

    /**
     * Updated search
     *
     * @return void
     */
    public function updatedSearch()
    {
        $this->populatePosts();
    }

    /**
     * Reset the search filter
     *
     * @return void
     */
    public function resetSearch(): void
    {
        $this->search = '';
        $this->populatePosts();
    }

    /**
     * Render the posts page
     *
     * @return View
     */
    public function render(): View
    {
        Page::setTitle('Posts Home');

        return view('ui.posts.posts')
            ->layout(UiLayout::class);
    }

}
