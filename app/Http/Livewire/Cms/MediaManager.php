<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Page;
use App\View\Components\CmsLayout;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Media Manager iframe component
 *
 */
class MediaManager extends Component
{
    /**
     * Render the iframe page
     *
     * @return View
     */
    public function render(): View
    {
        Page::setTitle('Media Manager');

        return view('cms.media-manager')
            ->layout(CmsLayout::class);
    }
}
