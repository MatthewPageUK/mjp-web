@props(['href' => '#', 'title' => ''])

<p {!! $attributes->merge(['class' => '']) !!} >
    <a href="{{ $href }}" target="_blank" class="group" title="Open {{ $title }}">
        <span class="flex text-secondary-400 gap-1">
            <x-icons.material class="group-hover:animate-pulse">open_in_browser</x-icons.matertial>
            {{ $title }}
        </span>
        <span class="text-xs">{{ $href }}</span>
    </a>
</p>