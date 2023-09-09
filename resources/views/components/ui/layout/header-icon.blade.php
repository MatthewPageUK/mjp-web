{{-- A header icon link --}}
<a
    {{ $attributes->merge(['class' => 'transition-all duration-250']) }}
    target="_blank"
>{{ $slot }}</a>
