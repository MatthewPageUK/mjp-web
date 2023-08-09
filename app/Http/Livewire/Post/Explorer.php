<?php

namespace App\Http\Livewire\Post;

use App\Facades\Settings;
use App\Services\{
    Ui\PostService,
    SkillService,
};
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Post Explorer
 * Shows a list of Posts with a Skill filter
 *
 */
class Explorer extends Component
{
    /**
     * Posts to show
     *
     * @var Collection
     */
    public Collection $posts;

    /**
     * Postable skills
     *
     * @var Collection
     */
    public Collection $skills;

    /**
     * Selected skill
     *
     * @var int|string|null
     */
    public int|string|null $skill = null;

    /**
     * Introduction text
     *
     * @var string
     */
    public string $intro = '';

    /**
     * Post Service for retrieving Post models
     *
     * @var PostService
     */
    protected PostService $postService;

    /**
     * Skill Service for retrieving Skill models
     *
     * @var SkillService
     */
    protected SkillService $skillService;

    /**
     * Query string parameters
     *
     * @var array
     */
    protected $queryString = [
        'skill'  => ['except' => '']
    ];

    /**
     * Boot the component
     *
     * @param PostService $postService
     * @param SkillService $skillService
     * @return void
     */
    public function boot(PostService $postService, SkillService $skillService)
    {
        $this->postService = $postService;
        $this->skillService = $skillService;
    }

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        $this->populatePosts();
        $this->skills = $this->skillService->getPostableSkills();
        $this->intro = Settings::getValue('posts_intro');
    }

    /**
     * Updated the filter, refresh the post list
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function updated(string $name, mixed $value): void
    {
        $this->populatePosts();
    }

    /**
     * Populate the post list
     *
     * @return void
     */
    private function populatePosts(): void
    {
        $this->posts = $this->postService->getFiltered([
            'skill' => $this->skill,
        ]);
    }

    /**
     * Render the Posts page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.post.explorer')
            ->layout(UiLayout::class);
    }
}
