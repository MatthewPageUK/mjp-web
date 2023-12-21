<?php

namespace App\Livewire\Ui\Post;

use App\Models\Post;
use App\Services\{
    PageService,
    Ui\PostService,
};
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
    /**
     * Post to show
     *
     * @var Post|null
     */
    public ?Post $post;

    /**
     * Related posts
     *
     * @var array
     */
    public $relatedPosts = [];

    /**
     * Mount the component and populate the data
     *
     * @param PostService $postService
     * @param PageService $page
     * @param string $year
     * @param string $month
     * @param string $day
     * @param Post $post
     * @return void
     */
    public function mount(PostService $postService, PageService $page, $year, $month, $day, Post $post): void
    {
        $this->post = $post;
        $this->relatedPosts = $postService->getRecent(6, $this->post->postCategories()->first()?->slug);

        $page->setTitle('Posts');
        $page->appendTitle($this->post->name);
    }

    /**
     * Render the Post view
     *
     * @return View
     */
    public function render()
    {
        return view('ui.posts.post')
            ->layout(UiLayout::class);
    }
}
