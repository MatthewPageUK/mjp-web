<?php

namespace App\Livewire\Ui\Experience;

use App\Services\{
    PageService,
    SettingService,
    Ui\ExperienceService,
};
use App\View\Components\UiLayout;
use Illuminate\{
    Support\Collection,
    View\View,
};
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;

/**
 * Experience Timeline
 *
 */
class Index extends Component
{
    /**
     * Intro text
     *
     * @var string
     */
    public string $intro = '';

    /**
     * Mount the component and populate the data
     *
     * @param SettingService $settings
     * @param PageService $page
     * @return void
     */
    public function mount(
        SettingService $settings,
        PageService $page,
    )
    {
        $this->intro = $settings->getValue('experience_intro') ?? '';
        $page->setTitle('Experience Timeline');
    }

    /**
     * Get the Experiences.
     *
     * @param ExperienceService $experienceService
     * @return Collection|LengthAwarePaginator
     */
    public function getExperiencesProperty(
        ExperienceService $experienceService
    ): Collection|LengthAwarePaginator
    {
        return $experienceService->getAll();
    }

    /**
     * Render the Experiences timeline page
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.experiences.timeline')
            ->layout(UiLayout::class);
    }

}
