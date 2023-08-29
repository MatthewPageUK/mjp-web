<?php

namespace App\Http\Livewire\Ui\Demo;

use App\Facades\Ui\{
    Demos,
    Skills,
};
use App\Http\Livewire\Ui\Traits\HasSkillFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\{
    Component,
    WithPagination,
};

/**
 * UI - Demos - Homepage widget
 *
 * Shows 2 recent demos with simple pagination
 * and a skill filter.
 *
 */
class Widget extends Component
{
    use WithPagination;
    use HasSkillFilter;

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount(): void
    {
        // Get the skills for the skill filter list
        $this->setSkills(
            Skills::getDemoableSkills()
        );
    }

    /**
     * Get the query string, return empty array
     * to disable it on the homepage.
     *
     * @return array
     */
    public function getQueryString(): array
    {
        return [];
    }

    /**
     * Get the Demos and paginate them.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getDemosProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Demos::getFilteredQuery($filter)->paginate(2);
    }

    /**
     * Render the Demo list.
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.demos.homepage');
    }
}
