<?php

namespace App\Livewire\Ui\Post;

use App\Livewire\Ui\Traits\{
    HasPostCategoryFilter,
    HasSearchFilter,
    HasSkillFilter,
};
use App\Services\Ui\{
    PostService,
    SkillService,
};
use Illuminate\View\View;
use Livewire\{
    Component,
    WithPagination,
};

/**
 * UI - Posts - Homepage widget
 *
 * Shows 4 recent posts with simple pagination,
 * skill and category filters and a search field.
 *
 */
class Widget extends Component
{
    use WithPagination;
    use HasSearchFilter;
    use HasSkillFilter;
    use HasPostCategoryFilter;

    /**
     * Title of this widget on the page
     *
     * @var string
     */
    public string $title = 'Posts';

    /**
     * Mount the component
     *
     * @param SkillService $skillService
     * @param PostService $postService
     * @param string|null $selectedSkill
     * @param boolean $selectableSkill
     * @param string|null $title
     * @return void
     */
    public function mount(
        SkillService $skillService,
        PostService $postService,
        $selectedSkill = null,
        $selectableSkill = true,
        $title = null
    ): void
    {
        $this->selectableSkill = $selectableSkill;

        if ($title) {
            $this->title = $title;
        }

        // Get the skills for the skill filter list
        if ($this->selectableSkill) {
            $this->setSkills(
                $skillService->getPostableSkills()
            );
        }
        // Get the post categories filter list
        $this->setCategories(
            $postService->getCategories()
        );

        if ($selectedSkill) {
            $this->updatedSelectedSkill($selectedSkill);
        }
    }

    /**
     * Updated selected skill - override the trait method
     * to allow resetting search and category filters.
     *
     * @param string $skill
     * @return void
     */
    public function updatedSelectedSkill($skill)
    {
        $this->resetCategory();
        $this->resetSearch();
        $this->resetPage('posts');
    }

    /**
     * Updated post category
     *
     * @param string $category
     * @return void
     */
    public function updatedSelectedCategory($category)
    {
        $this->resetSkill();
        $this->resetSearch();
        $this->resetPage('posts');
    }

    /**
     * Get the Posts and paginate them
     *
     * @param PostService $postService
     * @return Collection
     */
    public function getPostsProperty(PostService $postService)
    {
        $filter = [];
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }
        if ($this->selectedCategory) {
            $filter['postCategory'] = $this->selectedCategory;
        }
        if ($this->search) {
            $filter['search'] = $this->search;
        }

        return $postService
            ->getFilteredQuery($filter)
            ->with(['skills', 'image'])
            ->paginate(4, pageName: 'posts');
    }

    /**
     * Render the Post list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.posts.homepage');
    }

}
