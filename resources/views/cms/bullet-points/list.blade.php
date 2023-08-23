{{-- Bullet Points list --}}
<ul class="mt-16"
    x-show="mode === 'read'"
>
    @foreach ($this->list as $model)
        <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-primary-400 hover:text-white" wire:key="model-{{ $model->id }}">

            {{-- Colour --}}
            <span class="{{ $model->colour }} block w-6 h-6 rounded-full lg:group-hover:w-32 transition-all"></span>

            {{-- Name --}}
            <button wire:click.prevent="update({{ $model->id }})" class="flex-1 text-left lg:text-2xl">{{ $model->name }}</button>

            {{-- Buttons --}}
            <div class="flex gap-1 ml-4">

                {{-- Edit --}}
                <x-cms.icon-button icon="edit" wire:click.prevent="update({{ $model->id }})" title="Edit" />

                {{-- Delete --}}
                <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $model->id }})" title="Delete" />

                <div class="grid grid-rows-2">

                    {{-- Up --}}
                    <x-cms.icon-button
                        icon="keyboard_arrow_up"
                        wire:click.prevent="move('up', {{ $model->id }})"
                        title="Move up"
                        iconClass="leading-none text-sm font-black"
                    />

                    {{-- Down --}}
                    <x-cms.icon-button
                        icon="keyboard_arrow_down"
                        wire:click.prevent="move('down', {{ $model->id }})"
                        title="Move down"
                        iconClass="leading-none text-sm font-black"
                    />
                </div>
            </div>
        </li>
    @endforeach
</ul>