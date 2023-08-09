<?php

namespace App\Http\Livewire\Project;

use App\Services\Ui\ProjectService;
use Illuminate\View\View;
use Livewire\Component;

class Recent extends Component
{
    public $projects;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(ProjectService $projectService)
    {
        $this->projects = $projectService->getRecent();
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
