<div class="col-span-12 text-right self-end mb-8" x-show="mode === 'create'">
    <x-cms.text-button wire:click.prevent="create" label="Create" />
    <x-cms.text-button wire:click.prevent="cancelAdd" label="Cancel" />
</div>