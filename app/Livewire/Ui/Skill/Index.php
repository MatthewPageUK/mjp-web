<?php

namespace App\Livewire\Ui\Skill;

use App\Livewire\Ui\Traits\HasSkillGroupFilter;
use App\Services\{
    PageService,
    SettingService,
    Ui\SkillGroupService,
    Ui\SkillService,
};
use App\View\Components\UiLayout;
use Illuminate\{
    Pagination\LengthAwarePaginator,
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Skills Index
 * Shows a list of Skills with a Skill group filter
 *
 */
class Index extends Component
{
    use HasSkillGroupFilter;

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
        'selectedSkillGroup'  => [
            'except' => '', 'as' => 'group'
        ]
    ];

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount(
        SkillGroupService $skillGroupService,
        PageService $page,
        SettingService $settings,
    ): void
    {
        // Get the skill groups for the skill filter list.
        $this->setSkillGroups(
            $skillGroupService->getActiveGroups()
        );

        // Default to web development skills.
        if (empty($this->selectedSkillGroup)) {
            $this->selectedSkillGroup = 'web-development';
        }

        // Get the intro text from the settings.
        $this->intro = $settings->getValue('skills_intro');

        $page->setTitle('Web Developement Skills');
        $page->setDescription('A list of web development skills and technologies I have experience with.');
    }

    /**
     * Get the Skills list.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getSkillsProperty(SkillService $skillService): Collection|LengthAwarePaginator
    {
        $filter = $this->selectedSkillGroup ?
            ['skillGroup' => $this->selectedSkillGroup] : [];

        return $skillService->getFilteredQuery($filter)
            ->orderBy('level', 'desc')
            ->get();
    }

    /**
     * Render the Skills page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.skills.skills')
            ->layout(UiLayout::class);
    }
}
