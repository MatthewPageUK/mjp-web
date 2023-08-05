<div class="col-span-12 text-right self-end mb-8" x-show="mode === 'update'">
    <x-cms.text-button wire:click.prevent="save" label="Save" class="text-green-400 hover:text-green-500" />
    <x-cms.text-button wire:click.prevent="cancelUpdate" label="Cancel" />
</div>