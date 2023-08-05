{{--
    CMS - Bullet Points - Editor
--}}
<x-cms.layout.page>

    <div x-data="{
        mode: @entangle('mode')
    }">

        {{-- Header --}}
        <x-cms.crud.header title="{{ $this->modelName }}s" />

        {{-- Session Messages --}}
        <x-cms.session-messages />

        {{-- Create / Update form --}}
        <x-cms.crud.form
            x-show="mode === 'create' || mode === 'update'"
            title="{{ ucwords($this->getMode()) }} {{ $this->modelName }}"
        >

            {{-- Name --}}
            <x-cms.crud.field name="Name">
                <x-cms.form.input wire:model="{{ $this->modelVar }}.name" class="text-2xl font-black" />
                <x-cms.validation-error field="{{ $this->modelVar }}.name" />
            </x-cms.crud.field>

            {{-- Position --}}
            <x-cms.crud.field name="Position">
                <x-cms.form.select wire:model="{{ $this->modelVar }}.order">
                    <option value="0">First</option>
                    @foreach ($this->points as $order => $bulletPoint)
                        <option value="{{ $order + 1 }}">After {{ $bulletPoint->name }}</option>
                    @endforeach
                </x-cms.form.select>
                <x-cms.validation-error field="{{ $this->modelVar }}.order" />
            </x-cms.crud.field>

            {{-- Buttons --}}
            <x-cms.crud.buttons-create />
            <x-cms.crud.buttons-update />

        </x-cms.crud.form>

        {{-- Delete confirmation form --}}
        <x-cms.crud.delete-form
            title="Delete {{ $this->modelName }} - {{ $this->{$this->modelVar}->name }}"
            question="Are you sure you want to delete this {{ strtolower($this->modelName) }}?"
        />

        {{-- Models list --}}
        <ul class="mt-16"
            x-show="mode === 'read'"
        >
            @foreach ($this->points as $model)
                <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-zinc-400 hover:text-white" wire:key="{{ $this->modelVar }}-{{ $model->id }}">

                    {{-- Colour --}}
                    <span class="{{ $model->colour }} block w-6 h-6 rounded-full lg:group-hover:w-32 transition-all"></span>

                    {{-- Name --}}
                    <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left lg:text-2xl">{{ $model->name }}</button>

                    {{-- Buttons --}}
                    <div class="flex gap-1 ml-4">

                        {{-- Edit --}}
                        <x-cms.icon-button icon="edit" wire:click.prevent="update({{ $model->id }})" title="Edit" />

                        {{-- Delete --}}
                        <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $model->id }})" title="Delete" />

                        <div class="grid grid-rows-2">

                            {{-- Up --}}
                            <x-cms.icon-button
                                icon="keyboard_arrow_up"
                                wire:click.prevent="move('up', {{ $model->id }})"
                                title="Move up"
                                iconClass="leading-none text-sm font-black"
                            />

                            {{-- Down --}}
                            <x-cms.icon-button
                                icon="keyboard_arrow_down"
                                wire:click.prevent="move('down', {{ $model->id }})"
                                title="Move down"
                                iconClass="leading-none text-sm font-black"
                            />
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        @if (count($this->points) < 1)
            {{-- No models - open the add form on render --}}
            <ul>
                <li class="text-2xl" wire:init="add">No {{ strtolower($this->modelName) }} found, create a new one.</li>
            </ul>
        @endif

    </div>

</x-cms.layout.page>
