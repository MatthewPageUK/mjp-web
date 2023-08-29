<?php

namespace App\Http\Livewire\Ui\Skill;

use App\Facades\{
    Page,
    Settings,
    Ui\Skills,
    Ui\SkillGroups,
};
use App\Http\Livewire\Ui\Traits\HasSkillGroupFilter;
use App\View\Components\UiLayout;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
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
        'selectedSkillGroup'  => ['except' => '', 'as' => 'group']
    ];

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        // Get the skills for the skill filter list
        $this->setSkillGroups(
            SkillGroups::getActiveGroups()
        );

        // Get the intro text
        $this->intro = Settings::getValue('skills_intro');

        Page::setTitle('Skills');
    }

    /**
     * Get the Skills.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getSkillsProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill group if set
        if ($this->selectedSkillGroup) {
            $filter['skillGroup'] = $this->selectedSkillGroup;
        }

        return Skills::getFilteredQuery($filter)
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
