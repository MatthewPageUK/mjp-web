{{--
    UI - Posts - Homepage Widget

--}}
<div>
    <div>
        <div class="md:flex mb-8 gap-8">
            <h1 class="flex-1 text-4xl font-black XXfont-orbitron text-secondary-400">
                <a class="hover:text-highlight-400" href="{{ route('posts') }}">
                    {{ $this->title }}
                </a>
            </h1>

            @if ($this->selectableSkill)
                {{-- Search filter --}}
                <div>
                    <x-auth.text-input wire:model.live="search" type="text" placeholder="search..." />
                </div>

                {{-- Category select --}}
                <div class="text-sm">
                    In
                    <select wire:model.live="selectedCategory" class="bg-primary-800 ml-2 border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600">
                        <option value="">Any category</option>
                        @foreach ($this->categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Skill select --}}

                <div class="text-sm">
                    Using
                    <select wire:model.live="selectedSkill" class="bg-primary-800 ml-2 border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600">
                        <option value="">Any skill</option>
                        @foreach ($this->skills as $skill)
                            <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        @if ($this->posts->count() > 0)
            <div class="md:grid md:grid-cols-4 gap-4 mt-4">
                @forelse ($this->posts as $key => $post)
                    <x-ui.posts.cards.medium :post="$post" />
                @empty
                    <div class="col-span-4 border rounded-lg overflow-hidden border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600 pb-2">
                        <span class="block leading-tight text-lg p-4 pb-2">No posts found</span>
                    </div>
                @endforelse

            </div>
            <div class="mt-2">
                <x-ui.pagination-dots :paginator="$this->posts" />
            </div>
        @else
            <p>No posts found.</p>
        @endif
    </div>
</div>
