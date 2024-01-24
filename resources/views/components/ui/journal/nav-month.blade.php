@props(['year', 'month', 'total', 'current'])

<div
    @class([
        'rounded-lg mb-2 bg-primary-700 overflow-hidden',
        'border border-primary-500 hover:bg-primary-600 hover:scale-105 transition transition-all duration-500 ease-in-out' => $month !== $current,
        'scale-105' => $month === $current,
    ])
>
    <a
        href="{{ route('journal', ['year' => $year, 'month' => $month]) }}"
        @class([
            'block flex items-center gap-1 px-3 py-2 hover:text-secondary-500',
            'bg-secondary-500 hover:text-white' => $month === $current,
        ])
    >
        <x-icons.material class="text-sm">calendar_month</x-icons.material>
        <span class="flex-1">{{ date("F", mktime(0, 0, 0, $month, 10)) }}</span>
        <span class="text-xs">{{ $total }}</span>
    </a>

</div>