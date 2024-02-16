@props(['year', 'total', 'current'])

<div
    @class([
        'border px-4 py-2 rounded-lg p-3 mb-2 border-primary-400 dark:border-primary-500 bg-primary-300 dark:bg-primary-700',
        'hover:bg-secondary-400 dark:hover:bg-primary-600 hover:scale-105 XXtransition XXtransition-all duration-500 ease-in-out' => $current !== $year,
    ])
>
    <a
        wire:click.prevent="setYear({{ $year }})"
        href="{{ route('journal', ['year' => $year, 'month' => 1]) }}"
        class="block flex items-center dark:hover:text-secondary-400 {{ $current === $year ? 'dark:text-amber-800 dark:text-secondary-400' : '' }}"
    >
        <span class="flex-1">{{ $year }}</span>
        @if ($current !== $year)
            <span class="text-xs">{{ $total }}</span>
        @endif
    </a>

    {{ $slot }}
</div>