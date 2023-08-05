<x-cms.layout.page>

<div x-data="{ mode: @entangle('mode') }">

    {{-- Header --}}
    <h1 class="text-4xl flex">
        <span class="flex-1">Bullet Points</span>

        {{-- Add button --}}
        <x-cms.icon-button
            wire:click.prevent="add"
            x-show="mode !== 'create'"
            title="Add Bullet Point"
            icon="add_circle" />
    </h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    {{-- Create / Edit form --}}
    <x-cms.form.form
        x-show="mode === 'create' || mode === 'edit'"
        title="{{ ucwords($this->mode) }} Bullet Point"
    >
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Title --}}
            <div>
                <label class="block mb-2">Title</label>
                <x-cms.form.input wire:model="newTitle" />
            </div>

            {{-- Position --}}
            <div>
                <label class="block mb-2">Position</label>
                <x-cms.form.select wire:model="newPosition">
                    <option value="0">First</option>
                    @foreach ($this->points as $order => $bulletPoint)
                        <option value="{{ $order + 1 }}">After {{ $bulletPoint->title }}</option>
                    @endforeach
                </x-cms.form.select>
            </div>

            {{-- Create buttons --}}
            @if ($this->mode === 'create')
                <div class="text-right self-end">
                    <x-cms.text-button wire:click.prevent="create" label="Create" />
                    <x-cms.text-button wire:click.prevent="cancelAdd" label="Cancel" />
                </div>
            @endif

            {{-- Edit buttons --}}
            @if ($this->mode === 'edit')
                <div class="text-right self-end">
                    <x-cms.text-button wire:click.prevent="save" label="Save" />
                    <x-cms.text-button wire:click.prevent="cancelEdit" label="Cancel" />
                </div>
            @endif

            <div><x-cms.validation-error field="newTitle" /></div>
            <div><x-cms.validation-error field="newPosition" /></div>
        </div>
    </x-cms.form.form>

    {{-- Delete confirmation --}}
    <x-cms.form.form
        x-show="mode === 'delete'"
        title="Delete Bullet Point '{{ $this->deleteTitle }}'"
    >
        <div class="grid grid-cols-2 items-center">
            <p>Are you sure you want to delete the bullet point?</p>
            <div class="text-right">
                <x-cms.text-button wire:click.prevent="delete" label="Delete" />
                <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
            </div>
        </div>
    </x-cms.form.form>

    {{-- Bullet point list --}}
    <ul class="mt-16"
        x-show="mode !== 'create' && mode !== 'edit'"
    >

        @forelse ($this->points as $bulletPoint)
            <li class="group flex gap-2 lg:gap-4 mb-2 border-b pb-2 items-center" wire:key="bullet-point-{{ $bulletPoint->id }}">

                {{-- Colour --}}
                <span class="{{ $bulletPoint->colour }} block w-8 h-8 rounded-full lg:group-hover:w-32 transition-all"></span>

                {{-- Title --}}
                <span class="flex-1 lg:text-2xl">{{ $bulletPoint->title }}</span>

                {{-- Buttons --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $bulletPoint->id }})" title="Edit" />
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $bulletPoint->id }})" title="Delete" />
                <div class="grid grid-rows-2">
                    <x-cms.icon-button icon="keyboard_arrow_up" wire:click.prevent="move('up', {{ $bulletPoint->id }})" title="Move up" class="leading-none" />
                    <x-cms.icon-button icon="keyboard_arrow_down" wire:click.prevent="move('down', {{ $bulletPoint->id }})" title="Move down" class="leading-none" />
                </div>

            </li>
        @empty
            {{-- No bullet points - open the add form on render --}}
            <li class="text-2xl" wire:init="add">No bullet points found.</li>
        @endforelse

    </ul>
</div>

</x-cms.layout.page>