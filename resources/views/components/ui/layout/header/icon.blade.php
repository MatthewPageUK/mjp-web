{{-- A header icon link --}}
<a
    {{ $attributes->merge([
        'class' => '
                        fill-primary-600
                        text-primary-600
                        dark:text-white
                        dark:fill-white
                        hover:fill-amber-400
                        hover:text-amber-400
                        dark:hover:fill-secondary-400
                    '
    ]) }}
    target="_blank"
>{{ $slot }}</a>
