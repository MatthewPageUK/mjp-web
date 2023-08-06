<?php

namespace App\Http\Livewire\Cms;

use App\Models\Experience;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Experiences selection panel for any model
 * with the Experienceable traits
 *
 */

class Experienceable extends Component
{
    /**
     * The current Experienceable model
     *
     * @var Experience|Experience|
     */
    public $experienceable;

    /**
     * Selectable experiences list (filtered)
     *
     * @var array|Collection
     */
    public $experiences = [];

    /**
     * Search filter string
     *
     * @var string
     */
    public $filter = '';

    /**
     * Link a experience to the current model
     *
     * @param int $experienceId
     * @return void
     */
    public function linkExperience(int $experienceId): void
    {
        $this->experienceable->experiences()->attach($experienceId);
        $this->experienceable->refresh();
        $this->fetchExperiences();
    }

    /**
     * Unlink a experience from the current model
     *
     * @param int $experienceId
     * @return void
     */
    public function unlinkExperience(int $experienceId): void
    {
        $this->experienceable->experiences()->detach($experienceId);
        $this->experienceable->refresh();
        $this->fetchExperiences();
    }

    /**
     * Filter has been updated
     *
     * @return void
     */
    public function updatedFilter()
    {
        $this->fetchExperiences();
    }

    /**
     * Fetch the experiences with the current filter
     *
     * @return void
     */
    public function fetchExperiences(): void
    {
        if ($this->filter) {
            $this->experiences = Experience::where('name', 'like', "%{$this->filter}%")
                ->whereNotIn('id', $this->experienceable->experiences->pluck('id'))
                ->orderBy('name')
                ->limit(5)
                ->get();
        } else {
            $this->experiences = [];
        }
    }

    /**
     * Render the Experience Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.experiences.experienceable-select');
    }
}
