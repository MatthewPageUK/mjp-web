@props([
    'title' => '',
    'question' => 'Are you sure you want to delete this item?',
])

<div class="absolute inset-0 bg-zinc-900 bg-opacity-70" x-show="mode === 'delete'"></div>
<x-cms.crud.form
    x-show="mode === 'delete'"
    title="{{ $title }}"
    class="z-[1000] p-32"
>
    <div class="col-span-12 grid grid-cols-2 items-center">
        <p>{{ $question }}</p>
        <div class="text-right">
            <x-cms.text-button wire:click.prevent="delete" label="Delete" />
            <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
        </div>
    </div>
</x-cms.crud.form>
