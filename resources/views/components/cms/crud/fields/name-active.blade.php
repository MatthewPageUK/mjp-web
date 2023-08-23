{{-- Name --}}
<x-cms.crud.field name="Name">
    <div class="flex gap-4 items-center">
        <div class="flex-1">
            <x-cms.form.input wire:model="model.name" class="text-2xl font-black" />
            <x-cms.validation-error field="model.name" />
        </div>
        <div>
            {{-- Active --}}
            <div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model="model.active" class="sr-only peer">
                    <div class="w-11 h-6 bg-primary-900 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-secondary-400
                        rounded-full peer peer-checked:after:translate-x-full
                        peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white
                        after:border-primary-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-secondary-400"></div>
                </label>
            </div>

        </div>
    </div>
</x-cms.crud.field>