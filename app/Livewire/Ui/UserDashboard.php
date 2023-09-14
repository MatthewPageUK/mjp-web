<?php

namespace App\Livewire\Ui;

use App\Facades\Page;
use App\Models\Project;
use App\View\Components\UiLayout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboard extends Component
{
    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        // if (! $this->project->isActive()) {
        //     abort(404);
        // }

        Page::setTitle('Dashboard - ' . Auth::user()->name);
    }

    /**
     * Render the Project view
     *
     * @return View
     */
    public function render(): \Illuminate\View\View
    {
        return view('ui.dashboard')
            ->layout(UiLayout::class);
    }
}
