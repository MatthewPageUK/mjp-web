<?php

namespace App\View\Components;

use Illuminate\View\{
    Component,
    View,
};

/**
 * General guest layout component.
 *
 * @property public bool $showMasthead Whether to show the masthead
 * @method __construct(bool $showMasthead): void
 * @method render(): View
 */
class GuestLayout extends Component
{
    /**
     * Construct the component
     *
     * @param bool $showMasthead    Whether to show the masthead
     * @return void
     */
    public function __construct(
        public bool $showMasthead = false
    ) {
        //
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
