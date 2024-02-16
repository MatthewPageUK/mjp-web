@props(['sort', 'current'])

<x-primary-button
    @class(['text-xs', '!dark:text-secondary-400 !text-white' => $current === $sort])
    wire:click="setReadingSort('{{ $sort->value }}')"
>
    {{ $slot }}
</x-primary-button>
