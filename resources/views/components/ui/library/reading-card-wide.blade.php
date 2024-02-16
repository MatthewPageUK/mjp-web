@props(['reading'])

<div>
    <button
        class="w-full text-left group/note"
        x-on:click="openNote = openNote === {{ $reading->id }} ? false : {{ $reading->id }}"
    >
        <p class="flex">
            <span class="flex-1 text-2xl font-semibold">
                Chapter : {{ $reading->chapter }}
            </span>
            <span>
                Pages {{ $reading->pages }}
            </span>
        </p>
        <p class="flex items-center">
            <span class="flex-1">
                {{ $reading->created_at->diffForHumans() }} for {{ $reading->duration }}
            </span>
            <span class="flex items-center gap-1 text-sm text-secondary-400 group-hover/note:text-secondary-600">
                <x-icons.material class="text-base">description</x-icons.material>
                <span x-text="openNote == {{ $reading->id }} ? 'Hide' : 'View'"></span> notes
            </span>
        </p>
    </button>
    <div x-show="openNote === {{ $reading->id }}" class="prose dark:prose-primary max-w-full max-h-[300px] overflow-y-auto bg-primary-100 dark:bg-primary-800 p-8 border rounded mt-2">
        @markdown($reading->notes ?? '')
    </div>
</div>
