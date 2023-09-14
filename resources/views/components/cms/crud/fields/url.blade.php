{{-- URL --}}
<x-cms.crud.field name="URL">
    <x-cms.form.input wire:model.live="model.url" />
    <x-cms.validation-error field="model.url" />
</x-cms.crud.field>
