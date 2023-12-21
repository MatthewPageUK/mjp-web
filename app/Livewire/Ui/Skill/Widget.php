<?php

namespace App\Livewire\Ui\Skill;

use App\Livewire\Ui\Traits\HasSkillGroupFilter;
use App\Services\Ui\{
    SkillGroupService,
    SkillService,
};
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
 * Shows 10 top skills with simple pagination
 * and a skill group filter.
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
    public function mount(SkillGroupService $skillGroupService): void
    {
        // Get the skill groups for the skill filter list.
        $this->setSkillGroups(
            $skillGroupService->getActiveGroups()
        );

        // Default to web development skills.
        $this->selectedSkillGroup = 'web-development';
        $this->skillGroup = $this->skillGroups->where('slug', $this->selectedSkillGroup)->first();
    }

    /**
     * Get the Skills and paginate them.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getSkillsProperty(SkillService $skillService): Collection|LengthAwarePaginator
    {
        $filter = $this->selectedSkillGroup ?
            ['skillGroup' => $this->selectedSkillGroup] : [];

        return $skillService->getFilteredQuery($filter)
            ->orderBy('level', 'desc')
            ->paginate(10, pageName: 'skills');
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
