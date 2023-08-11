{{-- Demos --}}
<x-cms.crud.selectable-relationship>

    <x-slot name="selected">
        @foreach ($this->demoable->demos->sortBy('created_at') as $demo)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $demo->name }}</span>
                <span class="flex text-xs text-primary-400">{{ $demo->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="unlinkDemo({{ $demo->id }})"
                    iconClass=""
                    icon="link_off"
                    title="Remove Demo"
                />
            </li>
        @endforeach
    </x-slot>

    <x-slot name="selectable">
        @foreach ($this->demos as $demo)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $demo->name }}</span>
                <span class="flex text-xs text-primary-400">{{ $demo->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="linkDemo({{ $demo->id }})"
                    iconClass=""
                    icon="add_link"
                    title="Link Demo"
                />
            </li>
        @endforeach
    </x-slot>

</x-cms.crud.selectable-relationship>
