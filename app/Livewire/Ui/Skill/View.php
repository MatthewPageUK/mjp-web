<?php

namespace App\Livewire\Ui\Skill;

use App\Models\Skill;
use App\Services\PageService;
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
    public function mount(PageService $page, Skill $skill)
    {
        if (! $this->skill->isActive()) {
            abort(404);
        }

        $skill->load(['skillJourneys', 'image', 'skillGroups', 'skillLogs']);

        $page->setTitle('Skills');
        $page->appendTitle($this->skill->name);
        $page->setDescription('Brief description about my ' . $this->skill->name . ' skills including projects, demos, articles and example work.');
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        $journeys = $this->skill->skillJourneys
            ->where('completed_at', null)
            ->sortByDesc('created_at');

        $journeysCompleted = $this->skill->skillJourneys
            ->where('completed_at', '!=', null)
            ->sortByDesc('completed_at');

        return view('ui.skills.skill', [
            'journeys' => $journeys,
            'journeysCompleted' => $journeysCompleted,
        ])
            ->layout(UiLayout::class);
    }
}
