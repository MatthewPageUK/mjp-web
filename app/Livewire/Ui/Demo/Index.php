<?php

namespace App\Livewire\Ui\Demo;

use App\Facades\{
    Page,
    Settings,
    Ui\Demos,
    Ui\Skills,
};
use App\Livewire\Ui\Traits\HasSkillFilter;
use App\View\Components\UiLayout;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
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
     * @return void
     */
    public function mount()
    {
        // Get the skills for the skill filter list
        $this->setSkills(
            Skills::getDemoableSkills()
        );

        // Get the intro text
        $this->intro = Settings::getValue('demos_intro');

        Page::setTitle('Demos and Examples');
    }

    /**
     * Get the Demos.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getDemosProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Demos::getFilteredQuery($filter)->get();
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
