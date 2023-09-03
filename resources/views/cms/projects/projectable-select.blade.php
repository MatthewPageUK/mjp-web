{{-- Projects --}}
<x-cms.crud.selectable-relationship>

    <x-slot name="selected">
        @foreach ($this->projectable->projects->sortBy('created_at') as $project)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $project->name }}</span>
                <span class="hidden md:block flex text-xs text-primary-400">{{ $project->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="unlinkProject({{ $project->id }})"
                    iconClass=""
                    icon="link_off"
                    title="Remove Project"
                />
            </li>
        @endforeach
    </x-slot>

    <x-slot name="selectable">
        @foreach ($this->projects as $project)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $project->name }}</span>
                <span class="hidden md:block flex text-xs text-primary-400">{{ $project->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="linkProject({{ $project->id }})"
                    iconClass=""
                    icon="add_link"
                    title="Link Project"
                />
            </li>
        @endforeach
    </x-slot>

</x-cms.crud.selectable-relationship>
