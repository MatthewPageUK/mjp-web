{{-- A simple card with group hover --}}
<div {{ $attributes->merge([
    'class' => "
        group/card
        border
        rounded-lg
        overflow-hidden
        border-primary-300 dark:border-primary-700
        bg-primary-100 dark:bg-primary-800
        hover:bg-white dark:hover:bg-primary-700
        hover:border-primary-400 dark:hover:border-primary-600
        hover:scale-105 hover:shadow-lg
        transition transition-all duration-500 ease-in-out
    "
]) }}>
    {{ $slot }}
</div>
