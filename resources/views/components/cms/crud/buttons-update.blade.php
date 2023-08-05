<div class="col-span-12 text-right self-end mb-8" x-show="mode === 'update'">
    <x-cms.button wire:click.prevent="save" class="text-green-400 hover:text-amber-400">
        <div class="flex items-center gap-1 ">
            <x-icons.material>save</x-icons.material>
            Save
        </div>
    </x-cms.button>
    <x-cms.button wire:click.prevent="cancelUpdate">
        <div class="flex items-center gap-1 ">
            <x-icons.material>cancel</x-icons.material>
            Cancel
        </div>
    </x-cms.button>
</div>