<?php

namespace App\Livewire\Ui\Post;

use App\Livewire\Ui\Traits\{
    HasPostCategoryFilter,
    HasSearchFilter,
};
use App\Models\PostCategory;
use App\Services\{
    PageService,
    Ui\PostService,
};
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\{
    Component,
    WithPagination,
};

/**
 * Posts Homepage component
 *
 */
class Index extends Component
{
    use WithPagination;
    use HasSearchFilter;
    use HasPostCategoryFilter;

    /**
     * Post Service
     *
     * @var PostService
     */
    protected PostService $postService;

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
     * @param PostService $postService
     * @param PageService $page
     * @return void
     */
    public function mount(PostService $postService, PageService $page): void
    {
        $this->populatePosts();
        $this->setCategories($postService->getCategories());

        foreach ($this->categories as $category) {
            $this->recentCategoryPosts[$category->slug] = $postService->getRecent(6, $category->slug);
        }

        $page->setTitle('Posts');
    }

    /**
     * Boot the component
     *
     * @param PostService $postService
     * @return void
     */
    public function boot(PostService $postService): void
    {
        $this->postService = $postService;
    }

    /**
     * Populate the experiencs list
     *
     * @return void
     */
    private function populatePosts(): void
    {
        foreach ($this->categories as $category) {
            $this->recentCategoryPosts[$category->slug] = $this->postService->getRecent(6, $category->slug);
        }

        if ($this->search) {
            $this->posts = $this->postService->getFilteredQuery([
                'search' => $this->search,
            ])->get();

            return;
        }

        $this->posts = $this->postService->getRecent(12);
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
        return view('ui.posts.posts')
            ->layout(UiLayout::class);
    }

}
