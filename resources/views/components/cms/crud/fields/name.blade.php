{{-- Name --}}
<x-cms.crud.field name="Name">
    <x-cms.form.input wire:model="model.name" class="text-2xl font-black" />
    <x-cms.validation-error field="model.name" />
</x-cms.crud.field>