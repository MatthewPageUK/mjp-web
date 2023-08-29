<?php

namespace App\Http\Livewire\Ui\Traits;

use Illuminate\Database\Eloquent\Collection;

/**
 * Common functionality for filtering by skill groups
 *
 */
trait HasSkillGroupFilter
{
    /**
     * Skill groups used list
     *
     * @var Collection
     */
    public Collection $skillGroups;

    /**
     * Selected skill group slug
     *
     * @var string
     */
    public string $selectedSkillGroup = '';

    /**
     * Set the skill groups list
     *
     * @param Collection $skillGroups
     * @return void
     */
    public function setSkillGroups(Collection $skillGroups): void
    {
        $this->skillGroups = $skillGroups;
    }

    /**
     * Reset the selected skill group
     *
     * @return void
     */
    public function resetSkillGroup(): void
    {
        $this->selectedSkillGroup = '';
    }

    /**
     * Updated selected skill group, reset pagination.
     *
     * @param string $skill
     * @return void
     */
    public function updatedSelectedSkillGroup($skillGroup): void
    {
        if (method_exists($this, 'resetPage')) {
            $this->resetPage();
        }
    }
}
