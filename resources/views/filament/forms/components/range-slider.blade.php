<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div class="flex w-full gap-4">
        <input class="flex-1" type="range" min="1" max="10" step="1" wire:model="{{ $getStatePath() }}">
        <span class="text-2xl font-black">{{ $getRecord()?->level }}</span>
    </div>

</x-dynamic-component>