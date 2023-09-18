<?php

namespace App\Livewire\Ui\Traits;

use App\Models\SkillGroup;
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

    public ?SkillGroup $skillGroup = null;

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
        if ($skillGroup !== '') {
            $this->skillGroup = SkillGroup::where('slug', $skillGroup)->first();
        } else {
            $this->skillGroup = null;
        }

        $pageName = 'page';

        if (is_array($this->paginators)) {
            $pageName = array_key_first($this->paginators) ?? 'page';

        }

        if (method_exists($this, 'resetPage')) {
            $this->resetPage($pageName);
        }
    }
}
