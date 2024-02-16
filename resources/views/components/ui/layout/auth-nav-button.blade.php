{{-- UI - Layout - Auth Nav bar button with icon --}}
@props([
    'route' => '',
    'title' => '',
    'label' => '',
    'icon' => '',
])
<a href="{{ route($route) }}" class="flex items-center gap-1 hover:text-highlight-400 XXtransition-all hover:font-medium" title="{{ $title }}">
    {{ $label }}
    <x-icons.material class="text-base">{{ $icon }}</x-icons.material>
</a>