<?php

namespace App\Http\Livewire\Layout;

use App\{
    Models\Masthead,
    Services\MastheadService,
};
use Illuminate\View\View;
use Livewire\Component;

/**
 * Livewire component to show a random Masthead on the home page with
 * the ability to cycle through other Mastheads.
 *
 * @property Masthead $masthead
 * @property MastheadService $mastheadService
 * @method boot(MastheadService $mastheadService): void
 * @method mount(): void
 * @method next(): void
 * @method render(): View
 */
class ShowMasthead extends Component
{
    /**
     * The MastheadService instance.
     *
     * @var MastheadService
     */
    protected MastheadService $mastheadService;

    /**
     * The current Masthead to show.
     *
     * @var Masthead
     */
    public Masthead $masthead;

    /**
     * Boot the component.
     *
     * @return void
     */
    public function boot(MastheadService $mastheadService): void
    {
        $this->mastheadService = $mastheadService;
    }

    /**
     * Mount the component and select a random Masthead.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->masthead = $this->mastheadService->getRandom();
    }

    /**
     * Render the Masthead view.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.show-masthead');
    }

    /**
     * Show the next Masthead.
     *
     * @return void
     */
    public function next(): void
    {
        $this->masthead = $this->mastheadService->getNext($this->masthead);
    }
}
