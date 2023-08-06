<?php

namespace App\Http\Livewire\Demo;

use App\Facades\Ui\Demos;
use App\Models\Skill;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * UI - Demos - Homepage widget
 *
 * Shows 2 recent demos with simple pagination
 *
 */
class HomepageWidget extends Component
{
    use WithPagination;

    /**
     * Skills used in Demos
     *
     * @var array
     */
    public $skills = [];

    /**
     * Selected skill
     *
     * @var string
     */
    public $selectedSkill = '';

    /**
     * Mount the component
     *
     * @return void
     */
    public function mount()
    {
        $this->skills = Skill::whereHas('demos')->get();
        //skillService->getDemoableSkills()
    }

    /**
     * Get the query string, return empty array
     * to disable it on the homepage.
     *
     * @return array
     */
    public function getQueryString()
    {
        return [];
    }

    /**
     * Updated selected skill
     *
     * @param string $skill
     * @return void
     */
    public function updatedSelectedSkill($skill)
    {
        $this->resetPage();
    }

    /**
     * Get the Demos and paginate them
     *
     * @return Collection
     */
    public function getDemosProperty()
    {
        $filter = [];
        if ($this->selectedSkill) {
            $filter['skill'] = $this->selectedSkill;
        }

        return Demos::getFilteredQuery($filter)->paginate(2);
    }

    /**
     * Render the Demo list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.demo.recent');
    }

}
