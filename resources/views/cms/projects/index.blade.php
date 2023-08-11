{{--
    CMS - Projects - Editor
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
                        <x-cms.form.input wire:model="project.name" class="text-2xl font-black" />
                        <x-cms.validation-error field="project.name" />
                    </div>
                    <div>
                        {{-- Active --}}
                        <div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" wire:model="project.active" class="sr-only peer">
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

            {{-- Github --}}
            <x-cms.crud.field name="Github URL">
                <x-cms.form.input wire:model="{{ $this->modelVar }}.github" />
                <x-cms.validation-error field="{{ $this->modelVar }}.github" />
            </x-cms.crud.field>

            {{-- Website --}}
            <x-cms.crud.field name="Website">
                <x-cms.form.input wire:model="{{ $this->modelVar }}.website" />
                <x-cms.validation-error field="{{ $this->modelVar }}.website" />
            </x-cms.crud.field>

            {{-- Last Active --}}
            <x-cms.crud.field name="Last Activity">
                <input type="date" wire:model.lazy="{{ $this->modelVar }}.last_active" class="w-full bg-primary-900"/>
                {{-- <x-cms.form.input wire:model="{{ $this->modelVar }}.website" /> --}}
                <x-cms.validation-error field="{{ $this->modelVar }}.last_active" />
            </x-cms.crud.field>

            @if ($this->mode === 'update')

                {{-- Skills --}}
                <x-cms.crud.field name="Skills">
                    <livewire:cms.skillable :skillable="$this->project" />
                </x-cms.crud.field>

                {{-- Posts --}}
                <x-cms.crud.field name="Posts">
                    <livewire:cms.postable :postable="$this->project" />
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
            @foreach ($this->projects as $model)
                <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="{{ $this->modelVar }}-{{ $model->id }}">

                    {{-- Dot --}}
                    <span @class([
                        'block w-2 h-6 rounded-full lg:group-hover:w-6 lg:group-hover:h-2 transition-all',
                        'bg-rose-400 lg:group-hover:bg-secondary-400' => $model->active === 1,
                        'bg-primary-400' => $model->active === 0,
                    ])></span>

                    {{-- Name --}}
                    <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left lg:text-2xl">{{ $model->name }}</button>

                    {{-- Last Active --}}
                    <span class="hidden lg:block text-xs text-center">Last active
                        <strong class="block font-black">{{ \Carbon\Carbon::parse($model->last_active)->diffForHumans() }}</strong>
                    </span>

                    {{-- Skills / Posts --}}
                    <span class="hidden lg:block text-xs text-center">
                        {{ $model->skills->count() }} skills<br>
                        {{ $model->posts->count() }} posts
                    </span>

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

        @if (count($this->projects) < 1)
            {{-- No models - open the add form on render --}}
            <ul>
                <li class="text-2xl" wire:init="add">No {{ strtolower($this->modelName) }} found, create a new one.</li>
            </ul>
        @endif

    </div>

</x-cms.layout.page>
