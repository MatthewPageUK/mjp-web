@props([
    'models' => [],
    'seperators' => [
        'default' => ', ',
        'last' => ' and ',
    ],
    'title' => 'View the %s page',
    'nameAttribute' => 'name',
    'routeAttribute' => 'routeUrl',
])
<span>
    @foreach ($models as $model)
        @php
            $name = is_string($nameAttribute)
                ? $model->$nameAttribute
                : $nameAttribute($model);

            $seperator = $loop->last
                ? ''
                : ($loop->remaining === 1
                    ? $seperators['last']
                    : $seperators['default']
                );

            $url = is_string($routeAttribute)
                ? $model->$routeAttribute
                : $routeAttribute($model);
        @endphp
        <a
            href="{{ $url }}"
            class="text-amber-600 hover:text-amber-400 dark:text-secondary-100 dark:hover:text-secondary-400"
            title="{{ sprintf($title, $name) }}"
        >{{ $name }}</a>{{ $seperator }}
    @endforeach
</span>
{{--

    WIP


    Basic usage :
        <x-ui.implode-and-link-model-collection
            :models="$skillLog->skills"
        />

    Using a custom name attribute :
        <x-ui.implode-and-link-model-collection
            :models="$customers"
            :nameAttribute="fn($model) => sprintf('%s %s', $model->firstname, $model->surname)"
        />

    Using a named route :
        <x-ui.implode-and-link-model-collection
            :models="$skillLog->skills"
            :routeAttribute="fn($model) => route('skills.show', $model)"
        />
--}}
