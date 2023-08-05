{{-- CMS Crud - Header --}}
@props([
    'title' => '',
])
<h1
    class="text-4xl flex"
    x-show="mode === 'read'"
>
    <span class="flex-1">{{ $title }}</span>

    {{-- Add button --}}
    <x-cms.icon-button
        wire:click.prevent="add"
        x-show="mode !== 'create'"
        title="Add {{ $title }}"
        icon="add_circle"
    />
</h1>