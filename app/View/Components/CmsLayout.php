<?php

namespace App\View\Components;

use App\Services\SettingService;
use Illuminate\View\{
    Component,
    View,
};

/**
 * CMS Interface / Back End layout
 *
 */
class CmsLayout extends Component
{
    /**
     * Construct the UI Layout
     *
     * @param string $title    The page title
     * @return void
     */
    public function __construct(
        public SettingService   $settings,
        public ?string          $title = null,
        public ?string          $routeName = null,
    ) {

        // If we don't have a title, use the site name and tagline
        if (! $this->title) {
            $this->title = sprintf('%s - %s',
                $this->settings->getValue('site_name'),
                $this->settings->getValue('site_tagline')
            );
        }

        // If we don't have a route name, use the current route name
        if (! $this->routeName) {
            $this->routeName = request()->route()->getName();
        }
    }

    /**
     * Render the main layout.
     *
     * @return View
     */
    public function render(): View
    {
        return view('layouts.cms');
    }
}
