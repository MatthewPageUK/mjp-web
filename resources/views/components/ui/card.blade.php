{{-- A simple card with group hover --}}
<div class="
    group
    border border-primary-700 bg-primary-800
    rounded-lg overflow-hidden
    hover:bg-primary-700 hover:border-primary-600 hover:scale-105
    transition transition-all duration-500 ease-in-out
">
    {{ $slot }}
</div>
