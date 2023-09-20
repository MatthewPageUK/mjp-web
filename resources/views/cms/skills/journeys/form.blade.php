{{-- Create / Update form --}}
<div x-show="mode === 'create' || mode === 'update'">
    <x-cms.crud.form

        title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
    >

        {{-- Name and active status --}}
        <x-cms.crud.fields.name />

        {{-- Completed at --}}
        <x-cms.crud.field name="Completed">
            <x-cms.validation-error field="model.completed_at" />
            <x-cms.form.input type="text" wire:model="model.completed_at" />
        </x-cms.crud.field>

        {{-- Buttons --}}
        <x-cms.crud.buttons-create />
        <x-cms.crud.buttons-update />

    </x-cms.form.form>
</div>