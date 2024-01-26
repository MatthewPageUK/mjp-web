<x-icons.material>local_library</x-icons.material>
<span class="flex-1">
    Read
    <a
        href="{{ $reading->book->routeUrl }}"
        title="{{ $reading->book->name }} - {{ $reading->book->tagline }}"
        class="text-secondary-100 hover:text-secondary-400"
    >{{ $reading->book->name }}</a>

    Chapter {{ $reading->chapter }}.

    <span class="block text-primary-400 text-sm">
        @if ($reading->pages)
            Pages {{ $reading->pages }}
        @endif
        ({{ $reading->duration }})
    </span>
</span>
