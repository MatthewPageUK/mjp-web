<?php

namespace App\Http\Livewire\Skill;

use App\Services\SkillService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HomepageWidget extends Component
{
    use WithPagination;

    private $skills;
    public $group = null;
    public $groups;

    private $baseQuery = null;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(SkillService $skillService)
    {
        // $this->skills = $skillService->getTop10($this->group);

        $this->baseQuery = $skillService->getBaseQuery();
        $query = $this->baseQuery;

        if ($this->group) {
            $query->inGroup($this->group);
        }

        $query->orderBy('level', 'desc');

        $this->skills = $query->paginate(5);

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
        $query = $this->baseQuery;

        if ($this->group) {
            $query->inGroup($this->group);
        }

        $query->orderBy('level', 'desc');

        $this->skills = $query->paginate(5);

        dd($this->skills);
        //$this->skills = app(SkillService::class)->getTop10($this->group);
    }

    /**
     * Render the Skills list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.skill.top10', ['skills' => $this->skills]);
    }
}
