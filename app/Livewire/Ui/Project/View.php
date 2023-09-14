<?php

namespace App\Livewire\Ui\Project;

use App\Facades\Page;
use App\Models\Project;
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
    /**
     * The Project being viewed
     *
     * @var Project|null
     */
    public ?Project $project;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Project $project)
    {
        if (! $this->project->isActive()) {
            abort(404);
        }

        Page::setTitle('Project - ' . $this->project->name);
    }

    /**
     * Render the Project view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.projects.project')
            ->layout(UiLayout::class);
    }
}
