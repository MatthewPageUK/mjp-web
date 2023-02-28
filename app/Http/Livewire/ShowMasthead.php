<?php

namespace App\Http\Livewire;

use App\Models\Masthead;
use App\Services\MastheadService;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Livewire component to show a random Masthead on the home page with
 * the ability to cycle through available Mastheads.
 *
 */
class ShowMasthead extends Component
{
    /**
     * The current Masthead.
     *
     * @var Masthead
     */
    public Masthead $masthead;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->masthead = app(MastheadService::class)->getRandomMasthead();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.show-masthead');
    }

    /**
     * Get the next Masthead.
     *
     * @return void
     */
    public function next(): void
    {
        $this->masthead = app(MastheadService::class)->getNextMasthead($this->masthead);
    }
}
