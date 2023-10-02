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

    {{-- Date --}}
    <x-cms.crud.field name="Date">
        <div class="grid grid-cols-12 gap-4 items-center">
            <div class="col-span-5">
                {{-- Start --}}
                <x-cms.form.input type="date" wire:model.blur="model.start" />
                <x-cms.validation-error field="model.start" />
            </div>
            <div class="col-span-2 text-center">to</div>
            <div class="col-span-5">
                {{-- End --}}
                <x-cms.form.input type="date" wire:model.blur="model.end" />
                <x-cms.validation-error field="model.end" />
            </div>
        </div>
        <x-cms.validation-error field="model.start" />
    </x-cms.crud.field>

    {{-- Key Points --}}
    <x-cms.crud.field name="Key Points">
        <ul>
            @foreach($this->model->key_points ?? [] as $key => $point)
                <li class="pb-2 mb-2 flex gap-2 items-start" wire:key="keypoints-{{ $key }}">
                    <div class="mt-2">
                        <span class="text-2xl">{{ $key + 1 }}. </span>
                    </div>
                    <div class="flex-1">
                        <x-cms.form.input type="text" class="text-lg font-semibold mb-1" wire:model.blur="model.key_points.{{ $key }}.title" />
                        <x-cms.form.input type="text" wire:model.blur="model.key_points.{{ $key }}.text" />
                        <x-cms.validation-error field="model.key_points.{{ $key }}.title" />
                        <x-cms.validation-error field="model.key_points.{{ $key }}.text" />
                    </div>
                    <x-cms.icon-button
                        class="mt-2"
                        icon="delete"
                        wire:click.prevent="removeKeyPoint({{ $key }})"
                        title="Remove Key Point"
                    />
                </li>
            @endforeach
        </ul>
        {{-- Add key point --}}
        <div x-data="{open: false}">
            <div class="flex justify-end">
                <button x-on:click.prevent="open = ! open" class="p-2 hover:text-secondary-400" title="Add Key Point">
                    <x-icons.material x-show="! open">add_circle</x-icons.material>
                    <x-icons.material x-show="open">expand_less</x-icons.material>
                </button>
            </div>
            <div x-show="open">
                <x-cms.form.input type="text" class="font-semibold" wire:model.blur="model.key_points.{{ sizeof($this->model->key_points ?? []) }}.title" />
                <x-cms.validation-error field="model.key_points.{{ sizeof($this->model->key_points ?? []) }}.title" />
            </div>
        </div>
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