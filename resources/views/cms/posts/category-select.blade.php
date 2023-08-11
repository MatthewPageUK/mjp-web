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
                            'bg-primary-700 hover:bg-primary-600' => ! $this->post->postCategories->contains($category),
                            'border border-primary-700 hover:border-primary-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-secondary-400 text-primary-800 font-semibold' => $this->post->postCategories->contains($category),
                        ])
                        type="button" wire:click.prevent="toggleCategory({{ $category->id }})">
                            {{ $category->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

</div>