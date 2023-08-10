<?php

namespace App\Http\Livewire\Skill;

use App\Facades\Ui\Skills;
use App\Http\Livewire\Ui\Traits\HasCategoryFilter;
use App\Models\Skill;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * UI - Skills - Homepage widget
 *
 * Shows 2 recent skills with simple pagination
 *
 */
class HomepageWidget extends Component
{
    use WithPagination;
    use HasCategoryFilter;

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        $this->setCategories(Skills::getCategories());
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
     * Updated skill category
     *
     * @param string $category
     * @return void
     */
    public function updatedSelectedCategory($category)
    {
        $this->resetPage();
    }

    /**
     * Get the Skills and paginate them
     *
     * @return Collection
     */
    public function getSkillsProperty()
    {
        $filter = [];
        if ($this->selectedCategory) {
            $filter['category'] = $this->selectedCategory;
        }

        return Skills::getFilteredQuery($filter)->paginate(10);
    }

    /**
     * Render the Skill list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.skill.top10');
    }

}
