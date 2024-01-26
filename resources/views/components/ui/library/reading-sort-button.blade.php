@props(['sort', 'current'])

<x-primary-button
    @class(['text-xs', '!text-secondary-400' => $current === $sort])
    wire:click="setReadingSort('{{ $sort->value }}')"
>
    {{ $slot }}
</x-primary-button>
