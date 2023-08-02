<?php

namespace App\Http\Livewire\Cms;

use App\Facades\Demos;
use App\Models\Demo;
use App\Models\Skill;
use App\View\Components\CmsLayout;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Skills selection panel for any model
 * with the Skillable traits
 *
 */

class Skillable extends Component
{
    /**
     * The current Skillable model
     *
     * @var Demo|Project...
     */
    public $skillable;

    /**
     * All skills
     *
     * @var array|Collection
     */
    public $skills = [];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount()
    {
        $this->skills = Skill::orderBy('name')->get();
    }

    /**
     * Hydrate the component
     *
     * @return void
     */
    public function hydrate()
    {
        $this->skills = Skill::orderBy('name')->get();
    }


    /**
     * Render the Demos page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.skills.skillable-select')
            ->layout(CmsLayout::class);
    }
}
