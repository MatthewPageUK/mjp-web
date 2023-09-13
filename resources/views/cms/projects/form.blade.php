{{-- Create / Update form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>
    {{-- Name and active status --}}
    <x-cms.crud.fields.name-active />

    {{-- Slug --}}
    <x-cms.crud.fields.slug />

    {{-- Description (Markdown) --}}
    <x-cms.crud.fields.markdown label="Description" field="description" />

    {{-- Github --}}
    <x-cms.crud.field name="Github URL">
        <x-cms.form.input wire:model="model.github" />
        <x-cms.validation-error field="model.github" />
    </x-cms.crud.field>

    {{-- Website --}}
    <x-cms.crud.field name="Website">
        <x-cms.form.input wire:model="model.website" />
        <x-cms.validation-error field="model.website" />
    </x-cms.crud.field>

    {{-- Last Active --}}
    <x-cms.crud.field name="Last Activity">
        <input type="date" wire:model.lazy="model.last_active" class="w-full bg-primary-900"/>
        <x-cms.validation-error field="model.last_active" />
    </x-cms.crud.field>

    @if ($this->modeName === 'update')

        {{-- Image --}}
        <x-cms.crud.fields.imageable />

        {{-- Skills --}}
        <x-cms.crud.fields.skillable />

        {{-- Posts --}}
        <x-cms.crud.fields.postable />

    @endif

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.crud.form>