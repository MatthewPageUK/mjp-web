<?php

namespace App\Livewire\Ui\Project;

use App\Livewire\Ui\Traits\HasSkillFilter;
use App\Services\Ui\{
    Projects,
    ProjectService,
    Skills,
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

        if ($this->selectableSkill) {
            $this->setSkills(
                $skillService->getProjectableSkills()
            );
        }

        if ($selectedSkill) {
            $this->updatedSelectedSkill($selectedSkill);
        }
    }

    /**
     * Get the Projects and paginate them.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getProjectsProperty(ProjectService $projectService): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return $projectService
            ->getFilteredQuery($filter)
            ->with(['skills', 'image'])
            ->orderBy('created_at', 'desc')
            ->paginate(2, pageName: 'projects');
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
