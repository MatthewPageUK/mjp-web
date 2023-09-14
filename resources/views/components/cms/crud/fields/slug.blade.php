{{-- Slug --}}
<x-cms.crud.field name="Slug">
    <x-cms.form.input wire:model.live="model.slug" />
    <x-cms.validation-error field="model.slug" />
</x-cms.crud.field>
