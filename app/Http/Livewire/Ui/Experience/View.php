<?php

namespace App\Http\Livewire\Ui\Experience;

use App\Facades\{
    Page,
    Ui\Experiences,
};
use App\Models\Experience;
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
     */
    public function mount(Experience $experience)
    {
        if (! $this->experience->isActive()) {
            abort(404);
        }

        // Next and previous experiences
        $this->next = Experiences::getNext($experience);
        $this->previous = Experiences::getPrevious($experience);

        // Set the page title
        Page::setTitle('Experience ' . $experience->name);
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.experiences.experience')
            ->layout(UiLayout::class);
    }
}
