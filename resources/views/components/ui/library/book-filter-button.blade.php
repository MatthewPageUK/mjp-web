@props(['filter', 'current'])

<x-primary-button
    @class(['text-xs', '!dark:text-secondary-400' => $current === $filter])
    wire:click="setFilter('{{ $filter->value }}')"
>
    {{ $slot }}
</x-primary-button>
