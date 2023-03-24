<?php

namespace App\Http\Livewire\Skill\Cms\Dashboard;

use App\Services\SkillService;
use Illuminate\View\View;
use Livewire\Component;

class Widget extends Component
{
    public $skills;
    public $group = null;
    public $groups;


    /**
     * Mount the component and populate the data
     *
     */
    public function mount(SkillService $skillService)
    {
        $this->skills = $skillService->getTop10($this->group);
        $this->groups = $skillService->getSkillGroups();
    }

    /**
     * Group has been updated, remake the skills list
     *
     * @param mixed $value
     * @return void
     */
    public function updatedGroup($value): void
    {
        if ($this->group === '') {
            $this->group = null;
        }

        $this->skills = app(SkillService::class)->getTop10($this->group);
    }

    /**
     * Render the Skills list
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.livewire.dashboard.skill');
    }
}
