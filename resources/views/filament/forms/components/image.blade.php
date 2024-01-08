<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{open: false, preview: true}">
        <div class="flex gap-1">
            <input class="flex-1" type="text" wire:model="{{ $getStatePath() }}">

            <button @click.prevent="preview = ! preview" title="Preview image">
                <x-icons.material >visibility</x-icon.material>
            </button>
            <button @click.prevent="open = ! open" title="Open media explorer">
                <x-icons.material >image_search</x-icon.material>
            </button>
        </div>
        <div x-show="preview">
            <img src="{{ $getRecord()?->url }}" class="w-full h-[450px] mt-4" />
        </div>
        <iframe x-show="open" src="https://media.mjp.co/ui/explorer" class="w-full h-[650px] mt-4" style="height: 450px"></iframe>
    </div>
</x-dynamic-component>
