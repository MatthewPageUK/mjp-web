<?php

namespace App\Livewire\Ui;

use App\Services\PageService;
use App\View\Components\UiLayout;
use Livewire\Component;

class ProjectQuote extends Component
{
    /**
     * Mount the component and populate the data
     *
     * @param PageService $page
     * @return void
     */
    public function mount(PageService $page): void
    {
        $page->setTitle('Project Quote');
    }

    /**
     * Render the quote view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.project-quote.index')
            ->layout(UiLayout::class);
    }
}
