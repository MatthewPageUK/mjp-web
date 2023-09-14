<?php

namespace App\Livewire\Cms;

use App\Models\SkillGroup;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Skills selection panel for any model
 * with the Skillable traits
 *
 */

class Skillable extends Component
{
    /**
     * The current Skillable model
     *
     * @var Demo|Project etc...
     */
    public $skillable;

    /**
     * All skill groups
     *
     * @var array|Collection
     */
    public $skillGroups = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->skillGroups = SkillGroup::with('skills')->orderBy('name')->get();
    }

    public function toggleSkill(int $skillId)
    {
        if ($this->skillable->skills->contains($skillId)) {
            $this->skillable->skills()->detach($skillId);
        } else {
            $this->skillable->skills()->attach($skillId);
        }

        $this->skillable->refresh();
    }

    /**
     * Render the Skill Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.skills.skillable-select');
    }
}
