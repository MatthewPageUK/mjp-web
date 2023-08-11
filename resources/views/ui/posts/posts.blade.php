{{--
    UI - Posts - Homepage Widget

--}}
<div>
    <div class="md:flex mb-8 gap-8">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-amber-400">
            <a class="hover:text-purple-400" href="{{ route('posts') }}">Posts</a>
        </h1>

        {{-- Search filter --}}
        <div x-data="{show: false}">
            <x-text-input wire:model="search" type="text" placeholder="search..." />
        </div>

        {{-- Category select --}}
        {{-- <div class="text-sm">
            In
            <select wire:model="selectedCategory" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any category</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div> --}}

        {{-- Skill select --}}
        {{-- <div class="text-sm">
            Using
            <select wire:model="selectedSkill" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any skill</option>
                @foreach ($this->skills as $skill)
                    <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div> --}}
    </div>

    {{-- Categories --}}
    <livewire:ui.post.category-header :category="$this->category" />

    <div class="grid grid-cols-3 gap-8 my-16">
        <div class="col-span-2 grid grid-rows-2 gap-8">

            {{-- First post --}}
            <div class="grid grid-cols-2 gap-4 XXborder XXborder-zinc-700  XXbg-zinc-800 XXhover:bg-zinc-700 XXhover:border-zinc-600 overflow-hidden">
                @php($post = $this->posts->first())

                <div class="col-span-1 XXp-4">
                    <h2 class="text-3xl">
                        <a href="{{ $post->url }}">{{ $post->name }}</a>
                    </h2>
                    <p>
                        {{ $post->snippet }}
                    </p>
                    <span class="text-xs">{{ $post->skills->pluck('name')->implode(', ') }}</span>
                    <span class="block text-xs pb-2 text-slate-500 flex items-center gap-1">
                        <x-icons.material class="text-sm">calendar_month</x-icons.material>
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>

                <div>
                    <img src="https://loremflickr.com/640/360/computer?lock=487643{{ $post->id }}" class="object-cover rounded-lg" />
                </div>

            </div>

            {{-- Next 4 posts --}}
            <div class="grid grid-cols-4 gap-4">
                @foreach ($this->posts->slice(1, 4) as $post)
                    <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                        <a href="{{ $post->url }}" class="block" title="View the '{{ $post->name }}' post">
                            <img src="https://loremflickr.com/640/360/computer?lock=487643{{ $post->id }}" class="" />
                            <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>
                            {{-- <span class="text-xs px-4">{{ $post->skills->pluck('name')->implode(', ') }}</span> --}}
                            <span class="block text-xs px-4 text-slate-500 flex items-center gap-1">
                                <x-icons.material class="text-sm">calendar_month</x-icons.material>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>


        {{-- Next 7 --}}
        <div class="grid grid-rows-7 gap-4">
            @foreach ($this->posts->slice(5, 7) as $post)
                <div class="border-b">

                    <h3 class="text-lg leading-tight">
                        <a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                    <span class="block text-xs text-slate-500 flex items-center gap-1">
                        <x-icons.material class="text-sm">calendar_month</x-icons.material>
                        {{ $post->created_at->diffForHumans() }} | Web Development
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    @if($this->search)


        @if ($this->posts->count() > 12)

            <h3 class="text-xl mb-8">More Results...</h3>

            <div class="grid grid-rows-7 gap-4 mb-16">
                @foreach ($this->posts->slice(12) as $post)
                    <div class="border-b">

                        <h3 class="text-lg leading-tight">
                            <a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                        <span class="block text-xs text-slate-500 flex items-center gap-1">
                            <x-icons.material class="text-sm">calendar_month</x-icons.material>
                            {{ $post->created_at->diffForHumans() }} | Web Development
                        </span>
                    </div>
                @endforeach
            </div>

        @endif

        <x-primary-button wire:click="resetSearch" class="mb-8">
            Reset search
        </x-primary-button>

    @endif

    @if (! $this->category && ! $this->search)
        @foreach ($this->categories as $category)
            <div class="my-16">
                <div class="flex gap-4 mb-4">
                    <h3 class="text-4xl whitespace-nowrap leading-tight">
                        {{ $category->name }}
                    </h3>
                    <div class="mt-6 w-full border-zinc-400 border-t"> </div>
                </div>
                <div class="grid grid-cols-6 gap-4">

                    @foreach ($this->recentCategoryPosts[$category->slug] as $post)

                        <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                            <a href="{{ $post->url }}" class="block" title="View the '{{ $post->name }}' post">
                                <img src="https://loremflickr.com/640/360/computer?lock=487643{{ $post->id }}" class="" />
                                <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>
                                {{-- <span class="text-xs px-4">{{ $post->skills->pluck('name')->implode(', ') }}</span> --}}
                                <span class="block text-xs px-4 pb-2 text-slate-500">Last activity : {{ $post->created_at->diffForHumans() }}</span>
                            </a>
                        </div>

                    @endforeach

                </div>
            </div>
        @endforeach
    @endif

{{--



    <div class="md:grid md:grid-cols-4 gap-4 mt-4">
        @forelse ($this->posts as $key => $post)
            <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                <a href="{{ $post->url }}" class="block" title="View the '{{ $post->name }}' post">
                    <img src="https://loremflickr.com/640/360/computer?lock=487643{{ $post->id }}" class="" />
                    <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>
                    <span class="text-xs px-4">{{ $post->skills->pluck('name')->implode(', ') }}</span>
                    <span class="block text-xs px-4 pb-2 text-slate-500">Last activity : {{ $post->created_at->diffForHumans() }}</span>
                </a>
            </div>
        @empty
            <div class="col-span-4 border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">
                <span class="block leading-tight text-lg p-4 pb-2">No posts found</span>
            </div>
        @endforelse

    </div> --}}
    <div class="mt-2">
        {{-- <x-layout.pagination-dots :paginator="$this->posts" /> --}}
    </div>
</div>
