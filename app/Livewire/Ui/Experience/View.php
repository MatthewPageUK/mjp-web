<?php

namespace App\Livewire\Ui\Experience;

use App\Models\Experience;
use App\Services\{
    PageService,
    Ui\ExperienceService,
};
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
    /**
     * The current experience
     *
     * @var Experience
     */
    public ?Experience $experience;

    /**
     * The next experience in the timeline
     *
     * @var Experience
     */
    public ?Experience $next;

    /**
     * The previous experience in the timeline
     *
     * @var Experience
     */
    public ?Experience $previous;

    /**
     * Mount the component and populate the data
     *
     * @param ExperienceService $experienceService
     * @param PageService $page
     * @param Experience $experience
     * @return void
     */
    public function mount(
        ExperienceService $experienceService,
        PageService $page,
        Experience $experience,
    ): void
    {
        if (! $this->experience->isActive()) {
            abort(404);
        }

        $this->next = $experienceService->getNext($experience);
        $this->previous = $experienceService->getPrevious($experience);

        $page->setBackgroundImage('mjp-back-work.jpg');
        $page->setTitle('Experiences');
        $page->appendTitle($experience->name);
    }

    /**
     * Render the Experience view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.experiences.experience')
            ->layout(UiLayout::class);
    }
}
