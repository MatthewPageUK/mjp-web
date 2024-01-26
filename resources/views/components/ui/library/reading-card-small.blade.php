@props(['reading'])

<x-ui.card>
    <div class="px-4 py-2">
        <p class="xflex">
            <p class="flex-1 text-xl font-semibold">
                <a href="{{ $reading->book->routeUrl }}" title="Reading notes for {{ $reading->book->name }} by {{ $reading->book->author }}">
                    {{ $reading->book->name }}
                </a>
            </p>
            <p>
                Chapter : {{ $reading->chapter }}
            </p>
        </p>
        <p class="text-xs flex items-center">
            <span class="flex-1">
                {{ $reading->created_at->diffForHumans() }} for {{ $reading->duration }}
            </span>
            <span>
                <a href="{{ $reading->book->routeUrl }}" class="flex items-center gap-1 text-sm text-secondary-400 hover:text-secondary-600">
                    <x-icons.material class="text-base">description</x-icons.material>
                    View notes
                </a>
            </span>
        </p>
    </div>
</x-ui.card>
