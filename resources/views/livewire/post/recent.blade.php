{{--
    UI - Posts - Homepage Widget

--}}
<div>
    <div class="md:flex mb-8 gap-8">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-amber-400">
            <a class="hover:text-purple-400" href="{{ route('posts') }}">Posts</a>
        </h1>

        {{-- Search filter --}}
        <div>
            <x-text-input wire:model="search" type="text" placeholder="search..." />
        </div>

        {{-- Category select --}}
        <div class="text-sm">
            In
            <select wire:model="selectedCategory" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any category</option>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Skill select --}}
        <div class="text-sm">
            Using
            <select wire:model="selectedSkill" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any skill</option>
                @foreach ($this->skills as $skill)
                    <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="md:grid md:grid-cols-4 gap-4 mt-4">
        @forelse ($this->posts as $key => $post)
            <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                <a href="{{ route('post', $post) }}" class="block" title="View the '{{ $post->name }}' post">
                    <img src="https://loremflickr.com/640/360/computer?random=487643{{ $post->id }}" class="" />
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

    </div>
    <div class="mt-2">
        <x-layout.pagination-dots :paginator="$this->posts" />
    </div>
</div>
