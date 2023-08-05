<x-cms.layout.page>

<div x-data="{ mode: @entangle('mode') }">

    {{-- Header --}}
    <h1 class="text-4xl flex">
        <span class="flex-1">Demos</span>

        {{-- Add button --}}
        <x-cms.icon-button
            wire:click.prevent="add"
            x-show="mode !== 'create'"
            title="Add Demo"
            icon="add_circle" />
    </h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    {{-- Create / Edit form --}}
    <x-cms.form.form
        x-show="mode === 'create' || mode === 'edit'"
        title="{{ ucwords($this->mode) }} Demo"
    >
        <div class="grid grid-cols-12 gap-x-8 gap-y-4">

            {{-- Name --}}
            <label class="col-span-3 block mb-2">Name</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="demo.name" />
                <x-cms.validation-error field="demo.name" />
            </div>

            {{-- Slug --}}
            <label class="col-span-3 block mb-2">Slug</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="demo.slug" />
                <x-cms.validation-error field="demo.slug" />
            </div>

            {{-- Description --}}
            <label class="col-span-3 block mb-2">Description</label>
            <div class="col-span-9">
                <x-cms.form.textarea wire:model="demo.description" class="h-64" />
                <x-cms.validation-error field="demo.description" />
            </div>

            {{-- URL --}}
            <label class="col-span-3 block mb-2">URL</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="demo.url" />
                <x-cms.validation-error field="demo.url" />
            </div>

            {{-- Demo URL --}}
            <label class="col-span-3 block mb-2">Demo URL</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model.lazy="demo.demo_url" />
                <x-cms.validation-error field="demo.demo_url" />
                {{-- @if ($this->demo && $this->demo->demo_url)
                    <iframe src="{{ $this->demo->demo_url }}" class="w-full h-64 mt-4"></iframe>
                @endif --}}
            </div>

            {{-- Active --}}
            <label class="col-span-3 block mb-2">Active</label>
            <div class="col-span-9">
                <x-cms.form.select wire:model="demo.active">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </x-cms.form.select>
                <x-cms.validation-error field="demo.active" />
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
                <div class="col-span-9 border border-zinc-700 rounded-lg p-4">
                    <livewire:cms.skillable :skillable="$this->demo" />
                </div>

                {{-- Posts --}}
                <label class="col-span-3 block mb-2">Posts</label>
                <div class="col-span-9 border border-zinc-700 rounded-lg p-4">
                    <livewire:cms.postable :postable="$this->demo" />
                </div>
            @endif

        </div>
    </x-cms.form.form>

    {{-- Delete confirmation --}}
    <x-cms.form.form
        x-show="mode === 'delete'"
        title="Delete Demo '{{ $this->demo->name }}'"
    >
        <div class="grid grid-cols-2 items-center">
            <p>Are you sure you want to delete the Demo?</p>
            <div class="text-right">
                <x-cms.text-button wire:click.prevent="delete" label="Delete" />
                <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
            </div>
        </div>
    </x-cms.form.form>

    {{-- Demo list --}}
    <ul class="mt-16">

        @forelse ($this->demos as $demo)
            <li class="group flex gap-4 mb-2 border-b pb-2 items-center" wire:key="demo-{{ $demo->id }}">

                {{-- Colour --}}
                <span class="{{ $demo->active ? 'bg-amber-400' : 'bg-zinc-400' }} block w-4 h-4 rounded-full group-hover:rounded-sm transition-all"></span>

                {{-- Name --}}
                <div class="flex-1">
                    <span class="block text-2xl">{{ $demo->name }}</span>
                    <span class="text-sm">{{ $demo->skills->implode('name', ', ') }}</span>
                    <span class="text-xs border rounded-full px-2 py-1">{{ $demo->posts->count() }} posts</span>
                </div>

                {{-- Buttons --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $demo->id }})" title="Edit" />
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $demo->id }})" title="Delete" />

            </li>
        @empty
            {{-- No demos - open the add form on render --}}
            <li class="text-2xl" wire:init="add">No demos found.</li>
        @endforelse

    </ul>
</div>

</x-cms.layout.page>
