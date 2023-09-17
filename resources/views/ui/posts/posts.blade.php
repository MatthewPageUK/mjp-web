{{--
    UI - Posts - Homepage Widget

--}}
<div>
    <div class="md:flex mb-8 gap-8">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-secondary-400">
            <a class="hover:text-highlight-400" href="{{ route('posts') }}">Posts</a>
        </h1>

        {{-- Search filter --}}
        <div x-data="{show: false}">
            <x-auth.text-input wire:model="search" type="text" placeholder="search..." />
        </div>

    </div>

    {{-- Categories Header --}}
    <livewire:ui.post.category-header :category="$this->category" />

    @if ($this->posts->count() > 0)
        <div class="grid grid-cols-3 gap-8 my-16">
            <div class="col-span-2 grid grid-rows-2 gap-8">

                {{-- First post --}}
                <x-ui.posts.cards.wide :post="$this->posts->first()" />

                {{-- Next 4 posts --}}
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($this->posts->slice(1, 4) as $post)
                        <x-ui.posts.cards.small :post="$post" />
                    @endforeach
                </div>

            </div>

            {{-- Next 7 --}}
            <div class="grid grid-rows-7 gap-4">
                @foreach ($this->posts->slice(5, 7) as $post)
                    <x-ui.posts.cards.line :post="$post" />
                @endforeach
            </div>
        </div>

        @if($this->search)
            {{-- Extra search results --}}
            @if ($this->posts->count() > 12)

                <h3 class="text-xl mb-8">More Results...</h3>

                <div class="grid grid-rows-7 gap-4 mb-16">
                    @foreach ($this->posts->slice(12) as $post)
                        <x-ui.posts.cards.line :post="$post" />
                    @endforeach
                </div>

            @endif

            <x-primary-button wire:click="resetSearch" class="mb-8">
                Reset search
            </x-primary-button>

        @endif

        @if (! $this->category && ! $this->search)
            {{-- Post Category List --}}
            @foreach ($this->categories as $category)
                <div class="my-16">
                    <div class="flex gap-4 mb-4">
                        <h3 class="text-4xl whitespace-nowrap leading-tight">
                            {{ $category->name }}
                        </h3>
                        <div class="mt-6 w-full border-primary-400 border-t"> </div>
                    </div>
                    <div class="grid grid-cols-6 gap-4">
                        {{-- Recent posts in category --}}
                        @foreach ($this->recentCategoryPosts[$category->slug] as $post)
                            <x-ui.posts.cards.small :post="$post" />
                        @endforeach

                    </div>
                </div>
            @endforeach
        @endif

        <div class="mt-2">
            {{-- <x-ui.pagination-dots :paginator="$this->posts" /> --}}
        </div>

    @endif
</div>
