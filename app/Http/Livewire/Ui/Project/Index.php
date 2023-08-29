<?php

namespace App\Http\Livewire\Ui\Project;

use App\Facades\{
    Page,
    Settings,
    Ui\Projects,
    Ui\Skills,
};
use App\Http\Livewire\Ui\Traits\HasSkillFilter;
use App\View\Components\UiLayout;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
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
     * @return void
     */
    public function mount()
    {
        // Get the skills for the skill filter list
        $this->setSkills(
            Skills::getProjectableSkills()
        );

        // Get the intro text
        $this->intro = Settings::getValue('projects_intro');

        Page::setTitle('Projects and Examples');
    }

    /**
     * Get the Projects.
     *
     * @return Collection|LengthAwarePaginator
     */
    public function getProjectsProperty(): Collection|LengthAwarePaginator
    {
        $filter = [];

        // Filter by skill if set
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Projects::getFilteredQuery($filter)->get();
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
