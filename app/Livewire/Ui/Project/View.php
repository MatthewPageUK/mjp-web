<?php

namespace App\Livewire\Ui\Project;

use App\Models\Project;
use App\Services\PageService;
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
     * @param PageService $page
     * @param Project $project
     * @return void
     */
    public function mount(PageService $page, Project $project): void
    {
        if (! $this->project->isActive()) {
            abort(404);
        }

        $project->load([
            'image', 'skills',
        ]);

        $page->setTitle('Coding Project');
        $page->appendTitle($this->project->name);
    }

    /**
     * Render the Project view
     *
     * @return View
     */
    public function render()
    {
        return view('ui.projects.project')
            ->layout(UiLayout::class);
    }
}
