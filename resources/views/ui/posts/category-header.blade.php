{{--
    UI - Posts - Category Header

--}}
<div>
    {{-- Categories --}}
    <div class="grid grid-cols-4 items-center text-center border border-primary-500 rounded-lg overflow-hidden">

        <a href="{{ route('posts') }}" @class([
            'p-4',
            'hover:bg-primary-700' => $this->category,
            'bg-secondary-400 text-primary-900 hover:text-primary-900' => ! $this->category,
        ])>
            All posts
        </a>

        @foreach ($this->categories as $category)
            <a href="{{ $category->url }}" @class([
                'p-4',
                'hover:bg-primary-700' => ! $this->isCurrentCategory($category),
                'bg-secondary-400 text-primary-900 hover:text-primary-900' => $this->isCurrentCategory($category),
            ])>
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
