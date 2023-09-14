<?php

namespace App\Livewire\Ui\Demo;

use App\Facades\Page;
use App\Models\Demo;
use App\View\Components\UiLayout;
use Livewire\Component;

class View extends Component
{
    /**
     * The Demo being viewed
     *
     * @var Demo|null
     */
    public ?Demo $demo;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Demo $demo)
    {
        if (! $this->demo->isActive()) {
            abort(404);
        }

        Page::setTitle('Demo - ' . $this->demo->name);
    }

    /**
     * Render the Demo view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.demos.demo')
            ->layout(UiLayout::class);
    }
}
