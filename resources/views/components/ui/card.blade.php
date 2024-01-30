{{-- A simple card with group hover --}}
<div {{ $attributes->merge([
    'class' => "
        group/card
        border border-primary-700 bg-primary-800
        rounded-lg overflow-hidden
        hover:bg-primary-700 hover:border-primary-600 hover:scale-105 hover:shadow-lg
        transition transition-all duration-500 ease-in-out
    "
]) }}>
    {{ $slot }}
</div>
