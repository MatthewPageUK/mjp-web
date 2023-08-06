{{-- Posts --}}
<x-cms.crud.selectable-relationship>

    <x-slot name="selected">
        @foreach ($this->postable->posts->sortBy('created_at') as $post)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $post->name }}</span>
                <span class="flex text-xs text-zinc-400">{{ $post->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="unlinkPost({{ $post->id }})"
                    iconClass=""
                    icon="link_off"
                    title="Remove Post"
                />
            </li>
        @endforeach
    </x-slot>

    <x-slot name="selectable">
        @foreach ($this->posts as $post)
            <li class="flex items-center gap-2 mb-2">
                <span class="flex-1">{{ $post->name }}</span>
                <span class="flex text-xs text-zinc-400">{{ $post->created_at }}</span>
                <x-cms.icon-button
                    wire:click.prevent="linkPost({{ $post->id }})"
                    iconClass=""
                    icon="add_link"
                    title="Link Post"
                />
            </li>
        @endforeach
    </x-slot>

</x-cms.crud.selectable-relationship>
