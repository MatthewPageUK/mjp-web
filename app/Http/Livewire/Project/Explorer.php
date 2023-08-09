<?php

namespace App\Http\Livewire\Project;

use App\Facades\Settings;
use App\Services\{
    Ui\ProjectService,
    SkillService,
};
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Project Explorer
 * Shows a list of Projects with a Skill filter
 *
 */
class Explorer extends Component
{
    /**
     * Projects to show
     *
     * @var Collection
     */
    public Collection $projects;

    /**
     * Projectable skills
     *
     * @var Collection
     */
    public Collection $skills;

    /**
     * Selected skill
     *
     * @var int|string|null
     */
    public int|string|null $skill = null;

    /**
     * Introduction text
     *
     * @var string
     */
    public string $intro = '';

    /**
     * Project Service for retrieving Project models
     *
     * @var ProjectService
     */
    protected ProjectService $projectService;

    /**
     * Skill Service for retrieving Skill models
     *
     * @var SkillService
     */
    protected SkillService $skillService;

    /**
     * Query string parameters
     *
     * @var array
     */
    protected $queryString = [
        'skill'  => ['except' => '']
    ];

    /**
     * Boot the component
     *
     * @param ProjectService $projectService
     * @param SkillService $skillService
     * @return void
     */
    public function boot(ProjectService $projectService, SkillService $skillService)
    {
        $this->projectService = $projectService;
        $this->skillService = $skillService;
    }

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        $this->populateProjects();
        $this->skills = $this->skillService->getProjectableSkills();
        $this->intro = Settings::getValue('projects_intro');
    }

    /**
     * Updated the filter, refresh the project list
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function updated(string $name, mixed $value): void
    {
        $this->populateProjects();
    }

    /**
     * Populate the project list
     *
     * @return void
     */
    private function populateProjects(): void
    {
        $this->projects = $this->projectService->getFiltered([
            'skill' => $this->skill,
        ]);
    }

    /**
     * Render the Projects page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.project.explorer')
            ->layout(UiLayout::class);
    }
}
