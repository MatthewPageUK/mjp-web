<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Illuminate\View\View;
use Livewire\Component;

class ViewSkill extends Component
{
    public Skill $skill;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Skill $skill)
    {
        $this->skill = $skill;
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.skill.view');
    }
}
