<?php

namespace App\View\Components;

use Illuminate\View\{
    Component,
    View,
};

/**
 * Main User Interface / Front End layout
 *
 */
class UiLayout extends Component
{
    /**
     * Construct the UI Layout
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.ui');
    }
}
