<?php

namespace App\Livewire\Ui\Project;

use App\Contracts\Settings;
use App\Livewire\Ui\Traits\HasSkillFilter;
use App\Services\{
    PageService,
    Ui\ProjectService,
};
use App\Services\Ui\SkillService;
use App\View\Components\UiLayout;
use Illuminate\{
    Pagination\LengthAwarePaginator,
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Projects Index
 * Shows a list of Projects with a Skill filter
 *
 */
class Index extends Component
{
    use HasSkillFilter;

    /**
     * Introduction text
     *
     * @var string
     */
    public string $intro = '';

    /**
     * Query string parameters
     *
     * @var array
     */
    protected $queryString = [
        'selectedSkill'  => ['except' => '', 'as' => 'skill']
    ];

    /**
     * Mount the component and populate the data
     *
     * @param SkillService $skillService
     * @param Settings $settings
     * @param PageService $page
     * @return void
     */
    public function mount(
        SkillService $skillService,
        Settings $settings,
        PageService $page,
    ): void
    {
        $this->setSkills(
            $skillService->getProjectableSkills()
        );

        $this->intro = $settings->tryGetValue('projects_intro', 'Coding projects I have worked on');

        $page->setTitle('Coding Projects');
    }

    /**
     * Get the Projects.
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
            ->get();
    }

    /**
     * Render the Projects page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.projects.projects')
            ->layout(UiLayout::class);
    }
}
