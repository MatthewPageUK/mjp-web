{{-- Image editable URL and media explorer --}}
<div>
    <div x-data="{open: false, preview: false}">
        <div class="flex gap-1">
            <x-cms.form.input wire:model.blur="imageUrl" class="flex-1"/>
            <button @click.prevent="preview = ! preview" title="Preview image">
                <x-icons.material >visibility</x-icon.material>
            </button>
            <button @click.prevent="open = ! open" title="Open media explorer">
                <x-icons.material >image_search</x-icon.material>
            </button>
        </div>
        <x-cms.validation-error field="imageUrl" />
        <div x-show="preview">
            <img src="{{ $this->imageUrl }}" class="w-full h-[450px] mt-4" />
        </div>
        <iframe x-show="open" src="https://media.mjp.co/ui/explorer" class="w-full h-[650px] mt-4"></iframe>
    </div>
</div>
