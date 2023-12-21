<?php

namespace App\Livewire\Ui;

use App\Services\PageService;
use App\View\Components\UiLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboard extends Component
{
    /**
     * Mount the component and populate the data
     *
     */
    public function mount(PageService $page)
    {
        $page->setTitle('Dashboard');
        $page->appendTitle(Auth::user()->name);
    }

    /**
     * Render the Dashboard view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.dashboard')
            ->layout(UiLayout::class);
    }
}
