<?php

namespace App\Http\Livewire\Ui\Traits;

use Illuminate\Database\Eloquent\Collection;

trait HasSkillFilter
{
    /**
     * Skills used
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
     * Set the selectable skills
     *
     * @return void
     */
    public function setSkills(Collection $skills)
    {
        $this->skills = $skills;
    }

    /**
     * Reset the selected skill
     *
     * @return void
     */
    public function resetSkill()
    {
        $this->selectedSkill = '';
    }
}
