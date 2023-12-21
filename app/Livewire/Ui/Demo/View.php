<?php

namespace App\Livewire\Ui\Demo;

use App\Models\Demo;
use App\Services\PageService;
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
     * @param PageService $page
     * @param Demo $demo
     * @return void
     */
    public function mount(PageService $page, Demo $demo): void
    {
        if (! $this->demo->isActive()) {
            abort(404);
        }

        $page->setTitle('Code Demos');
        $page->appendTitle($this->demo->name);
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
