{{--
    UI - Skill activity panel, period filter button
--}}
@props(['currentPeriod', 'period'])

<button
    @class([
        'text-xs hover:text-secondary-400 px-1 first:pl-0.5 last:pr-0',
        'text-secondary-400' => (int) $period === $currentPeriod,
    ])
    wire:click="setPeriod({{ $period }})"
>
    {{ $slot }}
</button>