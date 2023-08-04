<?php

namespace App\Http\Livewire\Cms;

use App\Models\SkillGroup;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Skill Group selection panel for any model
 * with the Skill Groups
 *
 */

class SkillGroupable extends Component
{
    /**
     * The current Skill model
     *
     * @var Skill
     */
    public $skill;

    /**
     * All Skill Groups
     *
     * @var array|Collection
     */
    public $groups = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->groups = SkillGroup::with('skills')->orderBy('name')->get();
    }

    public function toggleGroup(int $groupId)
    {
        if ($this->skill->skillGroups->contains($groupId)) {
            $this->skill->skillGroups()->detach($groupId);
        } else {
            $this->skill->skillGroups()->attach($groupId);
        }

        $this->skill->refresh();
    }

    /**
     * Render the Skill Group Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.skills.group-select');
    }
}
