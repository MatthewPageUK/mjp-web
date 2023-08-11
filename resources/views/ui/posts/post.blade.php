<div>


    {{-- Categories --}}
    <livewire:ui.post.category-header :category="$post->postCategories()->first()" />

    <div class="border-b pb-8 mb-4 mt-16 grid grid-cols-3 items-center">
        <h1 class="col-span-2 text-5xl font-black">
            {{ $post->name }}
        </h1>
        <x-icons.material class="text-6xl justify-self-end">feed</x-icons.material>
    </div>

    <div class="grid grid-cols-2 gap-8 text-sm">

        <p>Created: {{ $post->created_at->format('d/m/Y') }}</p>
        <p class="self-end text-right">Last edited: {{ $post->updated_at->format('d/m/Y') }}</p>

    </div>


    <div class="lg:grid lg:grid-cols-3 gap-x-16 my-16">
        <div class="col-span-2">

            {{-- Categories --}}
            <div>
                Posted in:
                @foreach ($post->postCategories as $category)
                    <a href="" class="text-zinc-500 hover:text-zinc-400">{{ $category->name }}</a>
                    {{-- {{ route('category', $category->slug) }} --}}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>

            {{-- Snippet --}}
            <div class="prose prose-xl prose-zinc font-bold mb-8">
                @markdown($post->snippet)
            </div>


            {{-- Description --}}
            <div class="prose prose-lg prose-zinc">
                @markdown($post->content)
            </div>

        </div>

        <div>
            {{-- Related links --}}
            <x-related.links :model="$post" />
        </div>

    </div>


    <div>

            <div class="my-16">
                <div class="flex gap-4 mb-4">
                    <h3 class="text-4xl whitespace-nowrap leading-tight">
                        More from {{ $post->postCategories()->first()?->name }}
                    </h3>
                    <div class="mt-6 w-full border-zinc-400 border-t"> </div>
                </div>
                <div class="grid grid-cols-6 gap-4">

                    @foreach ($this->relatedPosts as $post)

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


    </div>


</div>
