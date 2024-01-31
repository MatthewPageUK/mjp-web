@props(['book'])

<x-ui.card class="grid">
    <a href="{{ $book->routeUrl }}" title="Reading notes for {{ $book->name }} by {{ $book->author }}">
        <div>
            <x-ui.imageable :model="$book" />
            <div class="p-4 space-y-2">
                <h3 class="text-lg font-semibold leading-tight group-hover/card:text-secondary-400">{{ $book->name }}</h3>
                <p class="font-light text-sm leading-tight">{{ $book->tagline }}</p>
                <p class="text-sm">By {{ $book->author }}</p>
            </div>
        </div>
    </a>
    <p class="font-light text-xs text-primary-400 self-end mb-2 mx-4">
        Read {{ $book->read_count }} times for {{ $book->readingTime }}
        <x-ui.badges.age :date="$book->readings->last()?->created_at" class="mt-1"/>
    </p>
</x-ui.card>