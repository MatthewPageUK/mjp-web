<?php

namespace App\Http\Livewire;

use App\Services\HitCounterService;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class HitCounter extends Component
{
    /**
     * The page to count hits for
     *
     * @var string
     */
    public string $page;

    /**
     * The number of hits recorded on the page
     *
     * @var int
     */
    public int $hits = 0;

    /**
     * Mount the component and register the hit
     *
     */
    public function mount(HitCounterService $hitCounterService, string $page): void
    {
        $this->page = $page;
        $this->hits = $hitCounterService->hit($page);
    }

    public function getCounterProperty(): string
    {
        return Str::padLeft($this->hits, 8, '0');
    }

    /**
     * Render the Hit Counter
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.hit-counter');
    }
}
