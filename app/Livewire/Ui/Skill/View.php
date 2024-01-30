<?php

namespace App\Livewire\Ui\Skill;

use App\Models\Skill;
use App\Services\PageService;
use App\View\Components\UiLayout;
use Illuminate\Support\Collection;
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
     * Completed skill journies
     *
     * @var Collection
     */
    public Collection $journeysCompleted;

    /**
     * Skill journies in progress
     *
     * @var Collection
     */
    public Collection $journeys;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(PageService $page, Skill $skill)
    {
        if (! $this->skill->isActive()) {
            abort(404);
        }

        $skill->load([
            'demos', 'demos.image', 'demos.skills',
            'projects', 'projects.image', 'projects.skills',
            'books', 'books.image', 'books.skills', 'books.readings',
            'skillJourneys', 'image', 'skillGroups', 'skillLogs'
        ]);

        $this->journeys = $this->skill->skillJourneys
            ->where('completed_at', null)
            ->sortByDesc('created_at');

        $this->journeysCompleted = $this->skill->skillJourneys
            ->where('completed_at', '!=', null)
            ->sortByDesc('completed_at');

        $page->setTitle('Skills');
        $page->appendTitle($this->skill->name);
        $page->setDescription('Brief description about my ' . $this->skill->name . ' skills including projects, demos, articles and example work.');
    }

    public function hasSkillJourneys(): bool
    {
        return $this->journeys->count() + $this->journeysCompleted->count() > 0;
    }

    public function hasCompletedSkillJourneys(): bool
    {
        return $this->journeysCompleted->count() > 0;
    }

    public function hasIncompleteSkillJourneys(): bool
    {
        return $this->journeys->count() > 0;
    }

    /**
     * Render the Skill view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {


        return view('ui.skills.skill')
            ->layout(UiLayout::class);
    }
}
