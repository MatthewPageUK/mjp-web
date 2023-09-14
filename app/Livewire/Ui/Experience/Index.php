<?php

namespace App\Livewire\Ui\Experience;

use App\Facades\{
    Page,
    Settings,
    Ui\Experiences,
};
use App\View\Components\UiLayout;
use Illuminate\{
    Support\Collection,
    View\View,
};
use Livewire\Component;

/**
 * Experience Timeline
 *
 */
class Index extends Component
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
        Page::setTitle('Experience Timeline');
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
        return view('ui.experiences.timeline')
            ->layout(UiLayout::class);
    }

}
