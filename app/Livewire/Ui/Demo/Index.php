<?php

namespace App\Livewire\Ui\Demo;

use App\Contracts\Settings;
use App\Livewire\Ui\Traits\HasSkillFilter;
use App\Services\{
    PageService,
    Ui\DemoService,
    Ui\SkillService
};
use App\View\Components\UiLayout;
use Illuminate\{
    Pagination\LengthAwarePaginator,
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Demos Index
 * Shows a list of Demos with a Skill filter
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
        // Set the skills for the skill filter list
        $this->setSkills(
            $skillService->getDemoableSkills()
        );

        // Get the page intro text
        $this->intro = $settings->tryGetValue('demos_intro');

        $page->setTitle('Demos and Examples');
    }

    /**
     * Get the Demos.
     *
     * @param DemoService $demoService
     * @return Collection|LengthAwarePaginator
     */
    public function getDemosProperty(DemoService $demoService): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        try {
            $demos = $demoService
                ->getFilteredQuery($filter)
                ->with(['skills', 'image'])
                ->get();

        } catch (\Exception $e) {
            // @todo Log this
            $demos = collect();
        }

        return $demos;
    }

    /**
     * Render the Demos page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.demos.demos')
            ->layout(UiLayout::class);
    }
}
