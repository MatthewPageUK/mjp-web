@props(['year', 'total', 'current'])

<div
    @class([
        'border px-4 py-2  border rounded-lg p-3 mb-2 border-primary-500 bg-primary-700',
        'hover:bg-primary-600 hover:scale-105 transition transition-all duration-500 ease-in-out' => $current !== $year,
    ])
>
    <a
        wire:click.prevent="setYear({{ $year }})"
        href="{{ route('journal', ['year' => $year, 'month' => 1]) }}"
        class="block flex items-center hover:text-secondary-400 {{ $current === $year ? 'text-secondary-400' : '' }}"
    >
        <span class="flex-1">{{ $year }}</span>
        @if ($current !== $year)
            <span class="text-xs">{{ $total }}</span>
        @endif
    </a>

    {{ $slot }}
</div>