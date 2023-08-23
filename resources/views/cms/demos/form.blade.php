
{{-- Create / Update form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>

    {{-- Name and active status --}}
    <x-cms.crud.fields.name-active />

    {{-- Slug --}}
    <x-cms.crud.fields.slug />

    {{-- Description --}}
    <x-cms.crud.fields.description />

    {{-- URL --}}
    <x-cms.crud.fields.url />

    {{-- Demo URL --}}
    <x-cms.crud.field name="Demo URL">
        <div x-data="{preview: false}">
            <div class="flex items-center gap-1">
                <x-cms.form.input wire:model.lazy="model.demo_url" />
                <button @click.prevent="preview = ! preview" title="Preview demo">
                    <x-icons.material x-show="! preview">visibility</x-icon.material>
                    <x-icons.material x-show="preview">visibility_off</x-icon.material>
                </button>
            </div>
            <x-cms.validation-error field="model.demo_url" />
            <div x-show="preview">
                <iframe src="{{ $this->model->model_url }}" class="w-full h-[450px] mt-4"></iframe>
            </div>
        </div>
    </x-cms.crud.field>

    {{-- Image WIP --}}
    <x-cms.crud.field name="Image">
        <div x-data="{open: false}">
            <x-cms.form.input XXwire:model="model.image" /> <button @click.prevent="open = ! open" title="Open media explorer">...</button>
            <x-cms.validation-error field="model.url" />
            <iframe x-show="open" src="https://media.mjp.co/ui/explorer" class="w-full h-[650px] mt-4"></iframe>
        </div>
    </x-cms.crud.field>

    <script>
        window.addEventListener(
            "message",
            (event) => {
                Livewire.emit('mediaSelected', event.data)
                console.log(event);
            },
            false,
            );
    </script>

    @if ($this->modeName === 'update')

        {{-- Skills --}}
        <x-cms.crud.fields.skillable />

        {{-- Posts --}}
        <x-cms.crud.fields.postable />

    @endif

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.crud.form>