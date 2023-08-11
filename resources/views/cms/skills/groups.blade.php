<div x-data="{ mode: @entangle('mode') }">

    {{-- Header --}}
    <h1 class="text-4xl flex">
        <span class="flex-1">Skill Groups</span>

        {{-- Add button --}}
        <x-cms.icon-button
            wire:click.prevent="add"
            x-show="mode !== 'create'"
            title="Add Group"
            icon="add_circle" />
    </h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    {{-- Create / Edit form --}}
    <x-cms.form.form
        x-show="mode === 'create' || mode === 'edit'"
        title="{{ ucwords($this->mode) }} Group"
    >
        <div class="grid grid-cols-12 gap-x-8 gap-y-4">

            {{-- Name --}}
            <label class="col-span-3 block mb-2">Name</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="group.name" />
                <x-cms.validation-error field="group.name" />
            </div>

            {{-- Slug --}}
            <label class="col-span-3 block mb-2">Slug</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="group.slug" />
                <x-cms.validation-error field="group.slug" />
            </div>

            {{-- Description --}}
            <label class="col-span-3 block mb-2">Description</label>
            <div class="col-span-9">
                <x-cms.form.textarea wire:model="group.description" class="h-32" />
                <x-cms.validation-error field="group.description" />
            </div>

            {{-- Create buttons --}}
            @if ($this->mode === 'create')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="create" label="Create" />
                    <x-cms.text-button wire:click.prevent="cancelAdd" label="Cancel" />
                </div>
            @endif

            {{-- Edit buttons --}}
            @if ($this->mode === 'edit')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="save" label="Save" />
                    <x-cms.text-button wire:click.prevent="cancelEdit" label="Cancel" />
                </div>
            @endif


            @if ($this->mode === 'edit')

                {{-- Skills --}}
                <label class="col-span-3 block mb-2">Skills</label>
                <div class="col-span-9 border border-primary-700 rounded-lg p-4">
                    <livewire:cms.skillable :skillable="$this->group" />
                </div>

            @endif

        </div>
    </x-cms.form.form>

    {{-- Delete confirmation --}}
    <x-cms.form.form
        x-show="mode === 'delete'"
        title="Delete Group '{{ $this->group->name }}'"
    >
        <div class="w-5xl grid grid-cols-2 items-center gap-4">
            <p class="col-span-2">Are you sure you want to delete the Group?</p>
            <p>Move {{ $this->group->skills->count() }} skills to the group : </p>

            <div class="">
                <x-cms.form.select Xwire:model="demo.active">
                    <option selected value="">No group</option>
                    @foreach ($this->groups->where('id', '!=', $this->group->id) as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </x-cms.form.select>
                <x-cms.validation-error field="demo.active" />
            </div>

            <div class="col-span-2 text-right">
                <x-cms.text-button wire:click.prevent="delete" label="Delete" />
                <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
            </div>
        </div>
    </x-cms.form.form>

    {{-- Group list --}}
    <ul class="mt-16">

        @forelse ($this->groups as $group)
            <li class="group flex gap-4 mb-2 border-b pb-2 items-center" wire:key="group-{{ $group->id }}">

                {{-- Colour --}}
                <span class="{{ $group->active ? 'bg-secondary-400' : 'bg-primary-400' }} block w-4 h-4 rounded-full group-hover:rounded-sm transition-all"></span>

                {{-- Name --}}
                <div class="flex-1">
                    <span class="block text-2xl">{{ $group->name }}</span>
                </div>

                {{-- Buttons --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $group->id }})" title="Edit" />
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $group->id }})" title="Delete" />

            </li>
        @empty
            {{-- No groups - open the add form on render --}}
            <li class="text-2xl" wire:init="add">No groups found.</li>
        @endforelse

    </ul>
</div>
