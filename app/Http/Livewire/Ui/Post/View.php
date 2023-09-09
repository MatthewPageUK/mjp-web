<?php

namespace App\Http\Livewire\Ui\Post;

use App\Facades\Ui\Posts;
use App\Models\Post;
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
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
     */
    public function mount($year, $month, $day, Post $post)
    {
        $this->post = $post;
        $this->relatedPosts = Posts::getRecent(6, $this->post->postCategories()->first()?->slug);
    }

    /**
     * Render the Post view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.posts.post')
            ->layout(UiLayout::class, [
                'title' => 'Post '.$this->post->name,
            ]);
    }
}
