<div class="col-span-12 text-right self-end mb-8" x-show="mode === 'create'">

    <x-cms.button wire:click.prevent="create" >
        <div class="flex items-center gap-1 ">
            <x-icons.material>save</x-icons.material>
            Create
        </div>
    </x-cms.button>

    <x-cms.button wire:click.prevent="cancelAdd">
        <div class="flex items-center gap-1 ">
            <x-icons.material>undo</x-icons.material>
            Cancel
        </div>
    </x-cms.button>

</div>
