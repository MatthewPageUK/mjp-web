
{{-- Create / Edit form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>

    {{-- Name and active status --}}
    <x-cms.crud.fields.name />

    {{-- Slug --}}
    <x-cms.crud.fields.slug />

    {{-- Description (Markdown) --}}
    <x-cms.crud.fields.description />

    @if ($this->modeName === 'update')

        {{-- Posts --}}
        <x-cms.crud.fields.postable />

    @endif

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.crud.form>
