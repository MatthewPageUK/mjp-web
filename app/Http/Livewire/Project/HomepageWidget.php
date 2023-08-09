<?php

namespace App\Http\Livewire\Project;

use App\Facades\Ui\Projects;
use App\Models\Skill;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * UI - Projects - Homepage widget
 *
 * Shows 2 recent projects with simple pagination
 *
 */
class HomepageWidget extends Component
{
    use WithPagination;

    /**
     * Skills used in Projects
     *
     * @var array
     */
    public $skills = [];

    /**
     * Selected skill
     *
     * @var string
     */
    public $selectedSkill = '';

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        $this->skills = Skill::whereHas('projects')->get();
        //skillService->getProjectableSkills()
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
        $this->resetPage();
    }

    /**
     * Get the Projects and paginate them
     *
     * @return Collection
     */
    public function getProjectsProperty()
    {
        $filter = [];
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Projects::getFilteredQuery($filter)->paginate(2);
    }

    /**
     * Render the Project list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.project.recent');
    }

}
