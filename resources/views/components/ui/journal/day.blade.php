<div class="grid grid-cols-2 mb-4 mt-8">
    <span class="text-3xl block text-secondary-400">
        {{ $entry->created_at->format('l') }}
    </span>
    <span class="justify-self-end text-3xl block text-secondary-400">
        {{ $entry->created_at->format('j') }}<span class="text-3xl font-light">{{ $entry->created_at->format('S') }}</span>
    </span>
</div>