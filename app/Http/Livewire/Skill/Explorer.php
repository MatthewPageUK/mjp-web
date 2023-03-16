<?php

namespace App\Http\Livewire\Skill;

use App\Services\SkillService;
use App\View\Components\GuestLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Skill Explorer
 * Shows a list of Skills with a filter for groups
 *
 */
class Explorer extends Component
{
    /**
     * Skills to show
     *
     * @var Collection
     */
    public Collection $skills;

    /**
     * Skill groups
     *
     * @var Collection
     */
    public Collection $groups;

    /**
     * Selected group
     *
     * @var string|null
     */
    public ?string $group = null;

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
        'group'  => ['except' => ''],
    ];

    /**
     * Boot the component
     *
     * @param SkillService $skillService
     * @return void
     */
    public function boot(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        $this->populateSkills();
        $this->populateGroups();
    }

    /**
     * Updated the filter, refresh the skill list
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function updated(string $name, mixed $value): void
    {
        $this->populateSkills();
    }

    /**
     * Populate the skill list
     *
     * @return void
     */
    private function populateSkills(): void
    {
        $this->skills = $this->skillService->getFiltered([
            'group' => $this->group,
        ]);

        if ($this->skills->count() < 1) {
            abort(404, 'No skills found');
        }
    }

    /**
     * Populate the skill groups list
     *
     * @return void
     */
    private function populateGroups(): void
    {
        $this->groups = $this->skillService->getSkillGroups();
    }

    /**
     * Render the Skills Explorer page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.skill.explorer')
            ->layout(GuestLayout::class);
    }

}
