<?php

namespace App\Livewire\Ui\Post;

use App\Facades\Ui\{
    Posts,
    Skills,
};
use App\Livewire\Ui\Traits\{
    HasPostCategoryFilter,
    HasSearchFilter,
    HasSkillFilter,
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
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        // Get the skills for the skill filter list
        $this->setSkills(
            Skills::getPostableSkills()
        );

        // Get the post categories filter list
        $this->setCategories(
            Posts::getCategories()
        );
    }

    /**
     * Get the query string, return empty array
     * to disable it on the homepage.
     *
     * @return array
     */
    // public function getQueryString()
    // {
    //     return [];
    // }

    /**
     * Updated selected skill
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
     * @return Collection
     */
    public function getPostsProperty()
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

        return Posts::getFilteredQuery($filter)->paginate(4, pageName: 'posts');
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
