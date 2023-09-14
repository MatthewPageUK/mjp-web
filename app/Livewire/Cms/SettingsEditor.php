<?php

namespace App\Livewire\Cms;

use App\Facades\Settings;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Settings Editor component
 *
 */

class SettingsEditor extends Component
{
    /**
     * All settings
     *
     * @var array|Collection
     */
    public $settings = [];

    /**
     * Mount the component and populate the data
     *
     * @param Request $request
     * @return void
     */
    public function mount(Request $request)
    {
        $this->setSettings();
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->setSettings();
    }

    /**
     * Set the Projects
     *
     * @return void
     */
    public function setSettings()
    {
        $this->settings = Settings::getAll();
    }

    /**
     * Render the Settings page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.settings.index')
            ->layout(CmsLayout::class, ['title' => 'CMS - Settings']);
    }
}
