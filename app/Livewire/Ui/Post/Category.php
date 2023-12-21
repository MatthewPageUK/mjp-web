<?php

namespace App\Livewire\Ui\Post;

use App\Livewire\Ui\Traits\{
    HasPostCategoryFilter,
    HasSearchFilter,
    HasSkillFilter,
};
use App\Models\PostCategory;
use App\Services\{
    PageService,
    Ui\PostService,
};
use App\View\Components\UiLayout;
use Illuminate\{
    Support\Collection,
    View\View,
};
use Livewire\{
    Component,
    WithPagination,
};

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
     * Selected category
     *
     * @var PostCategory
     */
    public ?PostCategory $category = null;

    /**
     * Mount the component and populate the data
     *
     * @param PostService $postService
     * @param PostCategory|null $category
     * @return void
     */
    public function mount(PostService $postService, ?PostCategory $category = null)
    {
        $this->populatePosts();
        $this->setCategories($postService->getCategories());

        foreach ($this->categories as $category) {
            $this->recentCategoryPosts[$category->slug] = $postService->getRecent(6, $category->slug);
        }
    }

    /**
     * Boot the component
     *
     * @param PostService $postService
     * @param PageService $pageService
     * @return void
     */
    public function boot(PostService $postService, PageService $pageService): void
    {
        $this->postService = $postService;

        $pageService->setTitle('Posts');

        if ($this->category) {
            $pageService->appendTitle($this->category->name);
        }
    }

    /**
     * Populate the posts list
     *
     * @return void
     */
    private function populatePosts(): void
    {
        if ($this->category) {
            $this->posts = $this->postService->getRecent(12, $this->category->slug);
        } else {
            $this->posts = $this->postService->getRecent(12);
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
            ->layout(UiLayout::class);
    }

}
