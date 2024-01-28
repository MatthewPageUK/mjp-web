@props(['day'])

<p
    @if (! $this->userIsAdmin)
        @if (! $day->date->isPast())
            x-on:click="toggleDay('{{ $day->dateString }}', {{ $day->am ?: 'false' }}, {{ $day->pm ?: 'false' }})"
            title="Click to toggle this day"
        @endif
    @endif
    @class([
        'p-2 flex items-center gap-2',
        'cursor-pointer' => ! $this->userIsAdmin && ! $day->date->isPast() && ($day->am || $day->pm),
    ])
>
    {{ $day->date->format('j') }}
    @if ($day->icon)
        <x-icons.material>{{ $day->icon }}</x-icons.material>
    @endif
</p>