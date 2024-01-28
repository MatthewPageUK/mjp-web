{{--
    Availability calendar period toggle
--}}
@props([
    'day',
    'period' => 'am',
])
<div
    @if ($this->userIsAdmin && ! $day->date->isPast())
        {{-- Admin - toggle availability of the period --}}
        wire:click="toggleAvailability('{{ $day->dateString }}', '{{ $period }}')"
        title="Click to toggle availability (admin)"
    @else
        @if ($day->$period && ! $day->date->isPast())
            {{-- User - toggle period --}}
            x-on:click="togglePeriod('{{ $day->dateString }}', '{{ $period }}')"
            x-bind:class="{
                'bg-highlight-400': isSelected('{{ $day->dateString }}', '{{ $period }}'),
            }"
            x-bind:title="isSelected('{{ $day->dateString }}', '{{ $period }}') ? 'Click to deselect this period' : 'Click to select this period'"
        @endif
    @endif
    @class([
        'grid items-center text-center text-xs py-2',
        'bg-amber-400' => $day->$period && ! $day->date->isPast(),
        'bg-primary-600' => ! $day->$period || $day->date->isPast(),
        'cursor-pointer' => ! $day->date->isPast() && ( $this->userIsAdmin || $day->$period ),
])>
    {{ strtoupper($period) }}
</div>