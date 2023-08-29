<?php

namespace App\Http\Livewire\Ui\Skill;

use App\Facades\Ui\{
    SkillGroups,
    Skills,
};
use App\Http\Livewire\Ui\Traits\HasSkillGroupFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\{
    Component,
    WithPagination,
};

/**
 * UI - Skills - Homepage widget
 *
 * Shows 2 recent skills with simple pagination
 *
 */
class Widget extends Component
{
    use WithPagination;
    use HasSkillGroupFilter;

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount(): void
    {
        $this->setSkillGroups(
            SkillGroups::getActiveGroups()
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
     * Get the Skills and paginate them.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getSkillsProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkillGroup) {
            $filter['skillGroup'] = $this->selectedSkillGroup;
        }

        return Skills::getFilteredQuery($filter)
            ->orderBy('level', 'desc')
            ->paginate(10);
    }

    /**
     * Render the Skill list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.skills.homepage');
    }

}
