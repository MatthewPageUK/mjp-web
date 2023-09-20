<?php

namespace App\Livewire\Ui\Project;

use App\Facades\Ui\{
    Projects,
    Skills,
};
use App\Livewire\Ui\Traits\HasSkillFilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\{
    Component,
    WithPagination,
};

/**
 * UI - Projects - Homepage widget
 *
 * Shows 2 recent projects with simple pagination
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
    public string $title = 'Projects';

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount(
        $selectedSkill = null,
        $selectableSkill = true,
        $title = null
    ): void
    {
        $this->selectableSkill = $selectableSkill;

        if ($title) {
            $this->title = $title;
        }

        $this->setSkills(
            Skills::getProjectableSkills()
        );

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
     * Get the Projects and paginate them.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getProjectsProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Projects::getFilteredQuery($filter)->paginate(2, pageName: 'projects');
    }

    /**
     * Render the Project list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.projects.homepage');
    }

}
