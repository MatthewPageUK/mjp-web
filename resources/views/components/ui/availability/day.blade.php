@props(['day'])

<div @class([
    'border border-primary-600 rounded overflow-hidden',
    'opacity-30' => $day->date->isPast() || ( ! $day->am && ! $day->pm ),
    'hover:border-primary-400' => ! $day->date->isPast() && ( $day->am || $day->pm ),
])>
    {{-- Day number --}}
    <x-ui.availability.day-toggle :day="$day" />

    <div class="grid grid-cols-2">

        {{-- AM period --}}
        <x-ui.availability.period-toggle :day="$day" period="am" />

        {{-- PM period --}}
        <x-ui.availability.period-toggle :day="$day" period="pm" />

    </div>
</div>