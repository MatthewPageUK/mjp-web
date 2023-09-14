<?php

namespace App\Livewire\Cms;

use App\Facades\BulletPoints;
use App\Facades\Demos;
use App\Models\BulletPoint;
use App\Models\Demo;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
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

    public $search;

    public $results = ['skills' => []];

    /**
     * Mount the component and populate the data
     *
     */
    public function mount(Request $request)
    {

    }

    public function updatedSearch()
    {
        $this->search();
    }

    public function search()
    {
        if (empty($this->search)) {
            $this->results = [];
            return;
        }

        $bullets = BulletPoint::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        $skills = Skill::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        $demos = Demo::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        $posts = Post::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        $projects = Project::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        $experience = Experience::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();

        $this->results = [
            'bullet-points' => $bullets,
            'skills' => $skills,
            'demos' => $demos,
            'posts' => $posts,
            'projects' => $projects,
            'experiences' => $experience,
        ];


    }

    /**
     * Render the Bullet Points page
     *
     * @return View
     */
    public function render(): View
    {
        return view('cms.dashboard')
            ->layout(CmsLayout::class, ['title' => 'CMS']);
    }
}
