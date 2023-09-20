<?php

namespace App\Livewire\Ui\Skill;

use App\Facades\Page;
use App\Models\Skill;
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
    /**
     * The Skill being viewed
     *
     * @var Skill|null
     */
    public ?Skill $skill;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Skill $skill)
    {
        if (! $this->skill->isActive()) {
            abort(404);
        }

        Page::setTitle('Skill - ' . $this->skill->name);
        Page::setDescription('Brief description about my ' . $this->skill->name . ' skills including projects, demos, articles and example work.');
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        $journeys = $this->skill->skillJourneys()
            ->orderBy('created_at', 'desc')
            ->whereNull('completed_at')
            ->get();

        $journeysCompleted = $this->skill->skillJourneys()
            ->orderBy('completed_at', 'desc')
            ->whereNotNull('completed_at')
            ->get();

        return view('ui.skills.skill', [
            'journeys' => $journeys,
            'journeysCompleted' => $journeysCompleted,
        ])
            ->layout(UiLayout::class);
    }
}
