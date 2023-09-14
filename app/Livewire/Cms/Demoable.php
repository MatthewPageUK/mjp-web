<?php

namespace App\Livewire\Cms;

use App\Models\Demo;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Demos selection panel for any model
 * with the Demoable traits
 *
 */

class Demoable extends Component
{
    /**
     * The current Demoable model
     *
     * @var Demo|Project|
     */
    public $demoable;

    /**
     * Selectable demos list (filtered)
     *
     * @var array|Collection
     */
    public $demos = [];

    /**
     * Search filter string
     *
     * @var string
     */
    public $filter = '';

    /**
     * Link a demo to the current model
     *
     * @param int $demoId
     * @return void
     */
    public function linkDemo(int $demoId): void
    {
        $this->demoable->demos()->attach($demoId);
        $this->demoable->refresh();
        $this->fetchDemos();
    }

    /**
     * Unlink a demo from the current model
     *
     * @param int $demoId
     * @return void
     */
    public function unlinkDemo(int $demoId): void
    {
        $this->demoable->demos()->detach($demoId);
        $this->demoable->refresh();
        $this->fetchDemos();
    }

    /**
     * Filter has been updated
     *
     * @return void
     */
    public function updatedFilter()
    {
        $this->fetchDemos();
    }

    /**
     * Fetch the demos with the current filter
     *
     * @return void
     */
    public function fetchDemos(): void
    {
        if ($this->filter) {
            $this->demos = Demo::where('name', 'like', "%{$this->filter}%")
                ->whereNotIn('id', $this->demoable->demos->pluck('id'))
                ->orderBy('name')
                ->limit(5)
                ->get();
        } else {
            $this->demos = [];
        }
    }

    /**
     * Render the Demo Selector page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.demos.demoable-select');
    }
}
