@props(['reading'])

<div>
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
        <span>
            <button
                x-on:click="openNote = openNote === {{ $reading->id }} ? false : {{ $reading->id }}"
                class="flex items-center gap-1 text-sm text-secondary-400 hover:text-secondary-600"
            >
                <x-icons.material class="text-base">description</x-icons.material>
                <span x-text="openNote == {{ $reading->id }} ? 'Hide' : 'View'"></span> notes
            </button>
        </span>
    </p>
    <div x-show="openNote === {{ $reading->id }}" class="prose prose-primary max-w-full max-h-[300px] overflow-y-scroll bg-primary-800 p-8 border rounded mt-2">
        @markdown($reading->notes)
    </div>
</div>
