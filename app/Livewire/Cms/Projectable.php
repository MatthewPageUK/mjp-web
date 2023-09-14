<?php

namespace App\Livewire\Cms;

use App\Models\Project;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Projects selection panel for any model
 * with the Projectable traits
 *
 */

class Projectable extends Component
{
    /**
     * The current Projectable model
     *
     * @var Project|Project|
     */
    public $projectable;

    /**
     * Selectable projects list (filtered)
     *
     * @var array|Collection
     */
    public $projects = [];

    /**
     * Search filter string
     *
     * @var string
     */
    public $filter = '';

    /**
     * Link a project to the current model
     *
     * @param int $projectId
     * @return void
     */
    public function linkProject(int $projectId): void
    {
        $this->projectable->projects()->attach($projectId);
        $this->projectable->refresh();
        $this->fetchProjects();
    }

    /**
     * Unlink a project from the current model
     *
     * @param int $projectId
     * @return void
     */
    public function unlinkProject(int $projectId): void
    {
        $this->projectable->projects()->detach($projectId);
        $this->projectable->refresh();
        $this->fetchProjects();
    }

    /**
     * Filter has been updated
     *
     * @return void
     */
    public function updatedFilter()
    {
        $this->fetchProjects();
    }

    /**
     * Fetch the projects with the current filter
     *
     * @return void
     */
    public function fetchProjects(): void
    {
        if ($this->filter) {
            $this->projects = Project::where('name', 'like', "%{$this->filter}%")
                ->whereNotIn('id', $this->projectable->projects->pluck('id'))
                ->orderBy('name')
                ->limit(5)
                ->get();
        } else {
            $this->projects = [];
        }
    }

    /**
     * Render the Project Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.projects.projectable-select');
    }
}
