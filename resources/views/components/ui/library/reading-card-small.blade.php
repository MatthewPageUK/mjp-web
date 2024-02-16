@props(['reading'])

<x-ui.card>
    <a href="{{ $reading->book->routeUrl }}" title="Reading notes for {{ $reading->book->name }} by {{ $reading->book->author }}">
        <div class="px-4 py-2">
            <p class="xflex">
                <p class="flex-1 text-xl font-semibold">
                    {{ $reading->book->name }}
                </p>
                <p>
                    Chapter : {{ $reading->chapter }}
                </p>
            </p>
            <p class="text-xs flex items-center">
                <span class="flex-1">
                    {{ $reading->created_at->diffForHumans() }} for {{ $reading->duration }}
                </span>
                <span class="flex items-center gap-1 text-sm text-secondary-400 group-hover/card:text-secondary-600">
                    <x-icons.material class="text-base">description</x-icons.material>
                    View notes
                </span>
            </p>
        </div>
    </a>
</x-ui.card>
