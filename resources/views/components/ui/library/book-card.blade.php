@props(['book'])

<x-ui.card>
    <a href="{{ $book->routeUrl }}" title="Reading notes for {{ $book->name }} by {{ $book->author }}">
        <div>
            <x-ui.imageable :model="$book" />
            <div class="p-4">
                <h3 class="text-lg font-semibold">{{ $book->name }}</h3>
                <p class="font-light">{{ $book->tagline }}</p>
                <p class="text-sm">By {{ $book->author }}</p>
            </div>
        </div>
    </a>
    <p class="text-xs self-end px-4 pb-4">
        Read {{ $book->read_count }} times for {{ $book->readings?->sum('minutes') }} minutes {{ $book->readings->last()?->created_at->diffForHumans() }}
    </p>
</x-ui.card>