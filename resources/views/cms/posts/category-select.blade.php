{{--
    Post Category selection panel for any
--}}
<div class="">
        <div class="">
            <ul class="grid grid-cols-2 gap-2">
                @foreach ($categories as $category)
                    <li>
                        <button
                            @class([
                            'w-full text-sm',
                            'bg-zinc-700 hover:bg-zinc-600' => ! $this->post->postCategories->contains($category),
                            'border border-zinc-700 hover:border-zinc-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-amber-400 text-zinc-800 font-semibold' => $this->post->postCategories->contains($category),
                        ])
                        type="button" wire:click.prevent="toggleCategory({{ $category->id }})">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

</div>