<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{open: false, preview: true}">
        <div class="flex gap-1">
            {{-- @todo sort this mess... --}}
            <input class="flex-1
                fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0
                disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)]
                sm:text-sm sm:leading-6 dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)]
                dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] bg-white/0 ps-3 pe-3
            " type="text" wire:model="{{ $getStatePath() }}">

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
