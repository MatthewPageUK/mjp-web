<?php

namespace App\Livewire\Ui;

use App\Interfaces\RouteableModel;
use App\Models\{
    Skill,
    Experience,
    Project,
    Demo,
    Post,
};
use Illuminate\View\View;
use Livewire\Component;

class RandomPage extends Component
{
    /**
     * The models to pick from
     *
     * @var array
     */
    protected $models = [
        Skill::class,
        Experience::class,
        Project::class,
        Demo::class,
        Post::class,
    ];

    /**
     * Get the random page route url from the models list.
     *
     * @return string
     */
    protected function getRandomUrl(): string
    {
        try {
            $url = collect($this->models)
                ->filter(function ($model) {
                    return in_array(RouteableModel::class, class_implements($model));
                })
                ->random()
                ::active()
                ->inRandomOrder()
                ->limit(1)
                ->first()
                ->routeUrl;

        } catch (\Exception $e) {
            $url = '/';
        }

        return $url;
    }

    /**
     * Jump to random page
     *
     * @return void
     */
    public function jumpToRandomPage(): void
    {
        redirect($this->getRandomUrl());
    }

    /**
     * Render the random page button.
     *
     * @return View
     */
    public function render(): View
    {
        return view('ui.random-page.button');
    }
}
