<div class="col-span-12 text-right self-end mb-8" x-show="mode === 'update'">
    <x-cms.button wire:click.prevent="cancelUpdate">
        <div class="flex items-center gap-1 ">
            <x-icons.material>undo</x-icons.material>
            Cancel
        </div>
    </x-cms.button>

    <x-cms.button wire:click.prevent="save" >
        <div class="flex items-center gap-1 ">
            <x-icons.material>save</x-icons.material>
            Save
        </div>
    </x-cms.button>
</div>