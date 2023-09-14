<?php

namespace App\Livewire\Ui;

use App\Models\{Skill, Experience, Project, Demo, Post};
use Illuminate\View\View;
use Livewire\Component;

class RandomPage extends Component
{
    /**
     * The random page
     *
     * @var string
     */
    public $page = '/';

    /**
     * Mount the component and pick a random
     * model from the database.
     *
     */
    public function mount()
    {
        try {
            $this->page = collect([
                'skill' => Skill::class,
                'experience' => Experience::class,
                'project' => Project::class,
                'demo' => Demo::class,
                'post' => Post::class,
            ])->random()::active()->get()->random()->routeUrl;
        } catch (\Exception $e) {
            $this->page = '/';
        }
    }

    /**
     * Render the Project list
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.random-page.button');
    }
}
