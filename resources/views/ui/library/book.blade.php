{{--
    UI - Library Book page
--}}
@use('App\Enums\BookReadingSort')
<div>

    <div class="grid grid-cols-12 gap-32">
        <div class="col-span-8 relative">

            {{-- Book details --}}
            <h1 class="text-5xl pr-48 mb-1">{{ $this->book->name }}</h1>
            <h2 class="text-xl pr-48">{{ $this->book->tagline }}</h2>
            <h3 class="text-lg mt-4">By {{ $this->book->author }}</h3>

            <div class="grid grid-cols-12 space-y-2 items-end mt-4">
                <p class="col-span-2">Publisher</p>
                <p class="col-span-10">{{ $this->book->publisher }}</p>

                <p class="col-span-2">Year</p>
                <p class="col-span-10">{{ $this->book->first_published?->format('Y') }} / {{ $this->book->published?->format('Y') }}</p>

                <p class="col-span-2">ISBN</p>
                <p class="col-span-10">ISBN - {{ $this->book->isbn }}</p>

                <p class="col-span-2">Last reading</p>
                <p class="col-span-10">{{ $this->book->readings->last()?->created_at->diffForHumans() }}</p>
            </div>

            {{-- Reading stats --}}
            <p class="absolute top-32 mt-4 right-0 w-40 h-40 rounded-full bg-secondary-400 flex items-center justify-center text-center">
                <span>
                    <span class="block mb-2 text-sm">Complete readings</span>
                    <span class="block text-5xl">{{ $this->book->read_count }}</span>
                </span>
            </p>
            <p class="absolute top-0 right-0 w-40 h-40 rounded-full bg-highlight-400 flex items-center justify-center text-center">
                <span>
                    <span class="block mb-2 text-sm">Total reading</span>
                    <span class="block text-3xl leading-7 px-8">{{ $this->book->readings->sum('minutes') }} minutes</span>
                </span>
            </p>

            {{-- Reading notes sort --}}
            <div class="flex items-center mt-24 border-b pb-4 mb-4">
                <h2 class="flex-1 text-4xl">Reading notes</h2>
                <p class="flex items-center gap-2">
                    <x-icons.material class="text-3xl text-primary-400 font-semibold">swap_vert</x-icons.material>
                    <x-ui.library.reading-sort-button :current="$this->sort" :sort="BookReadingSort::Latest">Latest</x-ui.library.reading-sort-button>
                    <x-ui.library.reading-sort-button :current="$this->sort" :sort="BookReadingSort::Oldest">Oldest</x-ui.library.reading-sort-button>
                    <x-ui.library.reading-sort-button :current="$this->sort" :sort="BookReadingSort::Chapter">Chapter</x-ui.library.reading-sort-button>
                </p>
            </div>

            {{-- Reading notes --}}
            <div class="grid grid-cols-1 space-y-8" x-data="{ openNote: false }">
                @foreach ($this->readings as $reading)
                    <x-ui.library.reading-card-wide :reading="$reading" />
                @endforeach
            </div>

            <div class="mt-16">
                <x-primary-button href="{{ route('library') }}" class="XXtext-secondary-400 XXhover:text-secondary-600 gap-2 w-full">
                    <x-icons.material class="text-base">arrow_back</x-icons.material>
                    Back to the bookshelf
                </x-primary-button>
            </div>
        </div>

        <div class="col-span-4">
            {{-- Book image --}}
            <x-ui.imageable :model="$this->book" class="rounded-lg shadow-xl"/>

            {{-- Notes --}}
            @if ($this->book->notes)
                <h3 class="text-2xl mt-8 border-b pb-2 mb-2">Notes</h3>
                <div class="prose prose-sm dark:prose-primary max-w-full XXbg-primary-800 XXp-8 XXborder XXrounded mt-2">
                    @markdown($this->book->notes)
                </div>
            @endif
        </div>
    </div>
</div>