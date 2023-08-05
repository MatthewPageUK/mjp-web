{{-- Posts --}}
<div class="bg-zinc-900 border border-zinc-700 rounded-lg p-4">
    <ul>
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
    </ul>

    <h3 class="text-2xl mt-4 mb-2">Link a Post</h3>
    <x-cms.form.input class="text-sm" wire:model="filter" placeholder="Search posts..." />
    <ul class="mt-2">
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
    </ul>
</div>