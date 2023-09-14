<?php

namespace App\Livewire\Cms;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Posts selection panel for any model
 * with the Postable traits
 *
 */

class Postable extends Component
{
    /**
     * The current Postable model
     *
     * @var Demo|Project|
     */
    public $postable;

    /**
     * Selectable posts list (filtered)
     *
     * @var array|Collection
     */
    public $posts = [];

    /**
     * Search filter string
     *
     * @var string
     */
    public $filter = '';

    /**
     * Link a post to the current model
     *
     * @param int $postId
     * @return void
     */
    public function linkPost(int $postId): void
    {
        $this->postable->posts()->attach($postId);
        $this->postable->refresh();
        $this->fetchPosts();
    }

    /**
     * Unlink a post from the current model
     *
     * @param int $postId
     * @return void
     */
    public function unlinkPost(int $postId): void
    {
        $this->postable->posts()->detach($postId);
        $this->postable->refresh();
        $this->fetchPosts();
    }

    /**
     * Filter has been updated
     *
     * @return void
     */
    public function updatedFilter()
    {
        $this->fetchPosts();
    }

    /**
     * Fetch the posts with the current filter
     *
     * @return void
     */
    public function fetchPosts(): void
    {
        if ($this->filter) {
            $this->posts = Post::where('name', 'like', "%{$this->filter}%")
                ->whereNotIn('id', $this->postable->posts->pluck('id'))
                ->orderBy('name')
                ->limit(5)
                ->get();
        } else {
            $this->posts = [];
        }
    }

    /**
     * Render the Post Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.posts.postable-select');
    }
}
