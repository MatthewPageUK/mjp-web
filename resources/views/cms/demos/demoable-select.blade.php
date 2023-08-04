{{-- Demos --}}
<div>
    <ul>
        @foreach ($this->demoable->demos->sortBy('created_at') as $demo)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $demo->name }}</span>
                <span class="flex text-xs text-zinc-400">{{ $demo->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="unlinkDemo({{ $demo->id }})"
                    iconClass=""
                    icon="link_off"
                    title="Remove Demo"
                />
            </li>
        @endforeach
    </ul>

    <h3 class="text-2xl mt-4 mb-2">Link a Demo</h3>
    <x-cms.form.input class="text-sm" wire:model="filter" placeholder="Search demos..." />
    <ul class="mt-2">
        @foreach ($this->demos as $demo)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $demo->name }}</span>
                <span class="flex text-xs text-zinc-400">{{ $demo->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="linkDemo({{ $demo->id }})"
                    iconClass=""
                    icon="add_link"
                    title="Link Demo"
                />
            </li>
        @endforeach
    </ul>
</div>