<?php

namespace App\Http\Livewire\Experience;

use App\Facades\Settings;
use App\Facades\Ui\Experiences;
use App\Services\SkillService;
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Experience Timeline
 *
 */
class Timeline extends Component
{
    /**
     * Experiences to show
     *
     * @var Collection
     */
    public Collection $experiences;

    /**
     * Intro text
     *
     * @var string
     */
    public string $intro = '';

    /**
     * Mount the component and populate the data
     *
     * @return void
     */
    public function mount()
    {
        $this->populateExperiences();
        $this->intro = Settings::getValue('experience_intro') ?? '';
    }

    /**
     * Populate the experiencs list
     *
     * @return void
     */
    private function populateExperiences(): void
    {
        $this->experiences = Experiences::getAll();
    }

    /**
     * Render the Skills Explorer page
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.experience.timeline')
            ->layout(UiLayout::class, [
                'title' => 'Experience Timeline',
                'showMasthead' => false,
            ]);
    }

}
