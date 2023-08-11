{{--
    CMS - Demos - Editor
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
                <div class="flex gap-4 items-center">
                    <div class="flex-1">
                        <x-cms.form.input wire:model="demo.name" class="text-2xl font-black" />
                        {{-- <span class="text-sm text-primary-400 pl-2">{{ $this->demo->slug }}</span> --}}
                        <x-cms.validation-error field="demo.name" />
                    </div>
                    <div>
                        {{-- Active --}}
                        {{-- <label class="col-span-3 block mb-2">Active</label> --}}
                        <div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" wire:model="demo.active" class="sr-only peer">
                                <div class="w-11 h-6 bg-primary-900 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-secondary-400
                                    rounded-full peer peer-checked:after:translate-x-full
                                    peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white
                                    after:border-primary-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary-400"></div>
                            </label>
                        </div>

                    </div>
                </div>
            </x-cms.crud.field>

            {{-- Slug --}}
            <x-cms.crud.field name="Slug">
                <x-cms.form.input wire:model="{{ $this->modelVar }}.slug" />
                <x-cms.validation-error field="{{ $this->modelVar }}.slug" />
            </x-cms.crud.field>

            {{-- Description --}}
            <x-cms.crud.field name="Description">
                <x-cms.form.textarea wire:model="{{ $this->modelVar }}.description" class="h-64" />
                <x-cms.validation-error field="{{ $this->modelVar }}.description" />
            </x-cms.crud.field>

            {{-- URL --}}
            <x-cms.crud.field name="URL">
                <x-cms.form.input wire:model="{{ $this->modelVar }}.url" />
                <x-cms.validation-error field="{{ $this->modelVar }}.url" />
            </x-cms.crud.field>

            {{-- Demo URL --}}
            <x-cms.crud.field name="Demo URL">
                <div x-data="{preview: false}">
                    <div class="flex items-center gap-1">
                        <x-cms.form.input wire:model.lazy="{{ $this->modelVar }}.demo_url" />
                        <button @click.prevent="preview = ! preview" title="Preview demo">
                            <x-icons.material x-show="! preview">visibility</x-icon.material>
                            <x-icons.material x-show="preview">visibility_off</x-icon.material>
                        </button>
                    </div>
                    <x-cms.validation-error field="{{ $this->modelVar }}.demo_url" />
                    <div x-show="preview">
                        <iframe src="{{ $this->demo->demo_url }}" class="w-full h-[450px] mt-4"></iframe>
                    </div>
                </div>
            </x-cms.crud.field>

            @if ($this->mode === 'update')

                {{-- Skills --}}
                <x-cms.crud.field name="Skills">
                    <livewire:cms.skillable :skillable="$this->demo" />
                </x-cms.crud.field>

                {{-- Posts --}}
                <x-cms.crud.field name="Posts">
                    <livewire:cms.postable :postable="$this->demo" />
                </x-cms.crud.field>

            @endif

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
            @foreach ($this->demos as $model)
                <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="{{ $this->modelVar }}-{{ $model->id }}">

                    {{-- Dot --}}
                    <span @class([
                        'block w-6 h-6 rounded-full lg:group-hover:h-2 transition-all',
                        'bg-emerald-400 lg:group-hover:bg-secondary-400' => $model->active === 1,
                        'bg-primary-400' => $model->active === 0,
                    ])></span>

                    {{-- Name --}}
                    <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left lg:text-2xl">{{ $model->name }}</button>

                    {{-- Buttons --}}
                    <div class="flex gap-1 ml-4">

                        {{-- Edit --}}
                        <x-cms.icon-button icon="edit" wire:click.prevent="update({{ $model->id }})" title="Edit" />

                        {{-- Delete --}}
                        <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $model->id }})" title="Delete" />

                    </div>
                </li>
            @endforeach
        </ul>

        @if (count($this->demos) < 1)
            {{-- No models - open the add form on render --}}
            <ul>
                <li class="text-2xl" wire:init="add">No {{ strtolower($this->modelName) }} found, create a new one.</li>
            </ul>
        @endif

    </div>

</x-cms.layout.page>
