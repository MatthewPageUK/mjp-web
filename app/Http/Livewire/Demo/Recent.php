<?php

namespace App\Http\Livewire\Demo;

use App\Services\DemoService;
use Illuminate\View\View;
use Livewire\Component;

class Recent extends Component
{
    public $demos;

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(DemoService $demoService)
    {
        $this->demos = $demoService->getRecent();
    }

    /**
     * Render the Demo list
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.demo.recent');
    }
}
