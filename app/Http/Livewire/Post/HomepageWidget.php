<?php

namespace App\Http\Livewire\Post;

use App\Facades\Ui\Posts;
use App\Http\Livewire\Ui\Traits\HasCategoryFilter;
use App\Http\Livewire\Ui\Traits\HasSearchFilter;
use App\Http\Livewire\Ui\Traits\HasSkillFilter;
use App\Models\Skill;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * UI - Posts - Homepage widget
 *
 * Shows 2 recent posts with simple pagination
 *
 */
class HomepageWidget extends Component
{
    use WithPagination;
    use HasSearchFilter;
    use HasSkillFilter;
    use HasCategoryFilter;

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        $this->setSkills(Skill::whereHas('posts')->get());
        $this->setCategories(Posts::getCategories());
    }

    /**
     * Get the query string, return empty array
     * to disable it on the homepage.
     *
     * @return array
     */
    public function getQueryString()
    {
        return [];
    }

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
        $this->resetPage();
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
        $this->resetPage();
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
            $filter['category'] = $this->selectedCategory;
        }
        if ($this->search) {
            $filter['search'] = $this->search;
        }

        return Posts::getFilteredQuery($filter)->paginate(4);
    }

    /**
     * Render the Post list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.post.recent');
    }

}
