<?php

namespace App\Http\Livewire\Demo;

use App\Services\{
    DemoService,
    SkillService,
};
use App\View\Components\GuestLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Demo Explorer
 * Shows a list of Demos with a Skill filter
 *
 */
class Explorer extends Component
{
    /**
     * Demos to show
     *
     * @var Collection
     */
    public Collection $demos;

    /**
     * Demoable skills
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
     * Demo Service for retrieving Demo models
     *
     * @var DemoService
     */
    protected DemoService $demoService;

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
     * @param DemoService $demoService
     * @param SkillService $skillService
     * @return void
     */
    public function boot(DemoService $demoService, SkillService $skillService)
    {
        $this->demoService = $demoService;
        $this->skillService = $skillService;
    }

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        $this->populateDemos();
        $this->skills = $this->skillService->getDemoableSkills();
    }

    /**
     * Updated the filter, refresh the demo list
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function updated(string $name, mixed $value): void
    {
        $this->populateDemos();
    }

    /**
     * Populate the demo list
     *
     * @return void
     */
    private function populateDemos(): void
    {
        $this->demos = $this->demoService->getFiltered([
            'skill' => $this->skill,
        ]);
    }

    /**
     * Render the Demos page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.demo.explorer')
            ->layout(GuestLayout::class);
    }
}
