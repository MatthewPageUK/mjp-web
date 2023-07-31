<?php

namespace App\Http\Livewire\Demo;

use App\Services\DemoService;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class HomepageWidget extends Component
{
    use WithPagination;
    private $demoService;

    public $queryString = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(DemoService $demoService)
    {
        $this->demoService = $demoService;
    }

    public function getDemosProperty()
    {
        return app()->make(DemoService::class)->getFilteredQuery([])->paginate(2);
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
