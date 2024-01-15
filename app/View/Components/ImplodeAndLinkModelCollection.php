<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ImplodeAndLinkModelCollection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array|Collection $models,
        public string|Closure $nameAttribute = 'name',
        public string|Closure $routeAttribute = 'routeUrl',
        public array $seperators = [
            'default' => ', ',
            'last' => ' and ',
        ],
        public string|Closure $title = 'View the %s page',
    ) {
        $listItems = $this->models->map(function ($model) {
            $name = is_string($this->nameAttribute)
                ? $model->{$this->nameAttribute}
                : ($this->nameAttribute)($model);

            $url = is_string($this->routeAttribute)
                ? $model->{$this->routeAttribute}
                : ($this->routeAttribute)($model);

            return [
                'name' => $name,
                'title' => '',
                'url' => $url,
            ];
        });
    //     @php
    //         $name = is_string($nameAttribute)
    //             ? $model->$nameAttribute
    //             : $nameAttribute($model);

    //         $seperator = $loop->last
    //             ? ''
    //             : ($loop->remaining === 1
    //                 ? $seperators['last']
    //                 : $seperators['default']
    //             );

    //         $url = is_string($routeAttribute)
    //             ? $model->$routeAttribute
    //             : $routeAttribute($model);
    //     @endphp
    //     <a
    //         href="{{ $url }}"
    //         class="text-secondary-100 hover:text-secondary-400"
    //         title="{{ sprintf($title, $name) }}"
    //     >{{ $name }}</a>{{ $seperator }}
    // @endforeach


        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.implode-and-link-model-collection');
    }
}
