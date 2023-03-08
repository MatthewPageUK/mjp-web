<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use App\Services\{
    SkillService,
};
use App\View\Components\GuestLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Skill Explorer
 * Shows a list of Skills with a filter
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
     * @var int|string|null
     */
    public int|string|null $group = null;



    public ?Skill $skill = null;

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
        $this->groups = $this->skillService->getSkillGroups();
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
    }

    /**
     * Render the Skills page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.skill.explorer')
            ->layout(GuestLayout::class);
    }


    public function setSkill(Skill $skill)
    {
        $this->skill = $skill;
    }
}
