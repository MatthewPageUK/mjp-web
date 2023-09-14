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
        return view('ui.skills.skill')
            ->layout(UiLayout::class);
    }
}
