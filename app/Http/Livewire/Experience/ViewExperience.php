<?php

namespace App\Http\Livewire\Experience;

use App\Facades\Ui\Experiences;
use App\Models\Experience;
use App\View\Components\UiLayout;
use Illuminate\View\View;
use Livewire\Component;

class ViewExperience extends Component
{
    public ?Experience $experience;

    public ?Experience $next;

    public ?Experience $previous;


    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Experience $experience)
    {
        $this->experience = $experience;
        $this->next = Experiences::getNext($experience);
        $this->previous = Experiences::getPrevious($experience);
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): View
    {
        return view('experience')
            ->layout(UiLayout::class, [
                'title' => 'Experience '.$this->experience->name,
            ]);
    }
}
