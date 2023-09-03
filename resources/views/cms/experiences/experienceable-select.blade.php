{{-- Experiences --}}
<x-cms.crud.selectable-relationship>

    <x-slot name="selected">
        @foreach ($this->experienceable->experiences->sortByDesc('start') as $experience)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $experience->name }}</span>
                <span class="hidden md:block flex text-xs text-primary-400">{{ $experience->start }}</span>
                <x-cms.icon-button
                    wire:click.prevent="unlinkExperience({{ $experience->id }})"
                    iconClass=""
                    icon="link_off"
                    title="Remove Experience"
                />
            </li>
        @endforeach
    </x-slot>

    <x-slot name="selectable">
        @foreach ($this->experiences as $experience)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $experience->name }}</span>
                <span class="hidden md:block flex text-xs text-primary-400">{{ $experience->start }}</span>
                <x-cms.icon-button
                    wire:click.prevent="linkExperience({{ $experience->id }})"
                    iconClass=""
                    icon="add_link"
                    title="Link Experience"
                />
            </li>
        @endforeach
    </x-slot>

</x-cms.crud.selectable-relationship>
