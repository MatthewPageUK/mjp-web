@props(['month', 'days'])

<x-ui.card class="px-8 py-4 pb-8">

    {{-- Month name and year --}}
    <h2 class="text-3xl font-semibold mb-4 flex">
        <span class="flex-1">{{ $month->format('F') }}</span>
        <span class="text-xl font-light">{{ $month->format('Y') }}</span>
    </h2>

    <div class="grid grid-cols-4 md:grid-cols-7 gap-2">

        {{-- Day names --}}
        <x-ui.availability.day-names />

        {{-- Day spacers --}}
        <x-ui.availability.day-spacers :month="$month" />

        {{-- Days in the month --}}
        @foreach ($days as $day)
            <x-ui.availability.day :day="$day" />
        @endforeach
    </div>
</x-ui.card>