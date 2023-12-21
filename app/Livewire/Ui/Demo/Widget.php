<?php

namespace App\Livewire\Ui\Demo;

use App\Livewire\Ui\Traits\HasSkillFilter;
use App\Services\Ui\{
    DemoService,
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
     * Title of this widget on the page
     *
     * @var string
     */
    public string $title = 'Demos';

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount(
        SkillService $skillService,
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
                $skillService->getDemoableSkills()
            );
        }

        if ($selectedSkill) {
            $this->updatedSelectedSkill($selectedSkill);
        }
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
     * @param DemoService $demoService
     * @return Collection|LengthAwarePaginator
     */
    public function getDemosProperty(DemoService $demoService): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return $demoService
            ->getFilteredQuery($filter)
            ->with(['skills', 'image'])
            ->paginate(2, pageName: 'demos');
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
