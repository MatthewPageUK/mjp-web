<?php

namespace App\Livewire\Cms;

use App\Facades\Cms\{
    BulletPoints,
    Demos,
    Experiences,
    Posts,
    Projects,
    Skills
};
use App\Facades\Page;
use App\View\Components\CmsLayout;
use Illuminate\View\View;
use Livewire\Component;

/**
 * CMS - Dashboard component with search filter.
 *
 */
class Dashboard extends Component
{

    /**
     * Current search string
     *
     * @var string
     */
    public $search;

    /**
     * Search results
     *
     * @var array
     */
    public $results = [];

    /**
     * Updated the search string
     *
     * @return void
     */
    public function updatedSearch(): void
    {
        $this->search();
    }

    /**
     * Perform the search
     *
     * @return void
     */
    public function search(): void
    {
        if (empty($this->search)) {
            $this->results = [];
            return;
        }

        try {
            $bullets    = BulletPoints::simpleSearch($this->search);
            $demos      = Demos::simpleSearch($this->search);
            $experience = Experiences::simpleSearch($this->search);
            $posts      = Posts::simpleSearch($this->search);
            $projects   = Projects::simpleSearch($this->search);
            $skills     = Skills::simpleSearch($this->search);

            $this->results = [
                'bullet-points' => $bullets,
                'demos'         => $demos,
                'experiences'   => $experience,
                'posts'         => $posts,
                'projects'      => $projects,
                'skills'        => $skills,
            ];
        } catch (\Exception $e) {
            $this->addError('search', $e->getMessage());
            $this->results = [];
        }
    }

    /**
     * Render the dashboard page
     *
     * @return View
     */
    public function render(): View
    {
        Page::setTitle('CMS Dashboard');

        return view('cms.dashboard')
            ->layout(CmsLayout::class);
    }
}
