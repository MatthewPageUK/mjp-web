{{-- Bullet Points Create / Update form --}}
<x-cms.crud.form
    x-show="mode === 'create' || mode === 'update'"
    title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
>

    {{-- Name --}}
    <x-cms.crud.fields.name />

    {{-- Position --}}
    <x-cms.crud.field name="Position">
        <x-cms.form.select wire:model="model.order">
            <option value="0">First</option>
            @foreach ($this->list as $order => $bulletPoint)
                <option value="{{ $order + 1 }}">After {{ $bulletPoint->name }}</option>
            @endforeach
        </x-cms.form.select>
        <x-cms.validation-error field="model.order" />
    </x-cms.crud.field>

    {{-- Buttons --}}
    <x-cms.crud.buttons-create />
    <x-cms.crud.buttons-update />

</x-cms.crud.form>