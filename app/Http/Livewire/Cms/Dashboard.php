<?php

namespace App\Http\Livewire\Cms;

use App\Facades\BulletPoints;
use App\Facades\Demos;
use App\View\Components\CmsLayout;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Dashboard component
 *
 */


class Dashboard extends Component
{

    public $bulletPoints = [];

    public $demos = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {
        $this->bulletPoints = BulletPoints::getAll()
            ->sortBy('title')
            ->pluck('title', 'id')
            ->toArray();

        $this->demos = Demos::getAll()
            ->sortBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }


    /**
     * Render the Bullet Points page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.dashboard')
            ->layout(CmsLayout::class);
    }
}
