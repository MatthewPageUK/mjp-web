<?php

namespace App\View\Components;

use App\Services\SettingService;
use Illuminate\View\{
    Component,
    View,
};

/**
 * Main User Interface / Front End layout
 *
 * @property public bool $showMasthead Whether to show the masthead
 * @property public string $title The page title
 * @method __construct(bool $showMasthead): void
 * @method render(): View
 */
class UiLayout extends Component
{
    /**
     * Construct the UI Layout
     *
     * @param bool $showMasthead    Whether to show the masthead
     * @return void
     */
    public function __construct(
        public SettingService $settings,
        public bool $showMasthead = false,
        public ?string $title = null,
    ) {
        if (! $this->title) {
            $this->title = sprintf('%s - %s',
                $this->settings->getValue('site_name'),
                $this->settings->getValue('site_tagline')
            );
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.ui');
    }
}
