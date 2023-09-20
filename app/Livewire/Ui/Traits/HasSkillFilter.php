<?php

namespace App\Livewire\Ui\Traits;

use Illuminate\Database\Eloquent\Collection;

/**
 * Common functionality for filtering by skill
 *
 */
trait HasSkillFilter
{
    /**
     * Skills used list
     *
     * @var Collection
     */
    public Collection $skills;

    /**
     * Selected skill slug
     *
     * @var string
     */
    public string $selectedSkill = '';

    /**
     * Is the skill select option active?
     *
     * @var bool
     */
    public bool $selectableSkill = true;

    /**
     * Set the skills list
     *
     * @param Collection $skills
     * @return void
     */
    public function setSkills(Collection $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * Reset the selected skill
     *
     * @return void
     */
    public function resetSkill(): void
    {
        $this->selectedSkill = '';
    }

    /**
     * Updated selected skill, reset pagination.
     *
     * @param string $skill
     * @return void
     */
    public function updatedSelectedSkill($skill): void
    {
        $pageName = 'page';

        if (property_exists($this, 'paginators') && is_array($this->paginators)) {
            $pageName = array_key_first($this->paginators) ?? 'page';

        }

        if (method_exists($this, 'resetPage')) {
            $this->resetPage($pageName);
        }
    }
}
