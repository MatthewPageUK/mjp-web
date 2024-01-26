{{--
    UI - Library homepage
--}}

@use('App\Enums\LibraryBookFilter')

<div>
    <div class="md:flex mb-8 gap-8">
        <h1 class="font-orbitron font-black text-5xl flex items-center gap-2">
            <span class="material-icons-outlined text-5xl">local_library</span>
            Library
        </h1>
    </div>

    {{-- Book filters --}}
    <p class="mb-8">
        <x-ui.library.book-filter-button :current="$this->filter" :filter="LibraryBookFilter::All">All</x-ui.library.book-filter-button>
        <x-ui.library.book-filter-button :current="$this->filter" :filter="LibraryBookFilter::Unfinished">Unfinished</x-ui.library.book-filter-button>
        <x-ui.library.book-filter-button :current="$this->filter" :filter="LibraryBookFilter::Unread">Unread</x-ui.library.book-filter-button>
        <x-ui.library.book-filter-button :current="$this->filter" :filter="LibraryBookFilter::Recent">Recently read</x-ui.library.book-filter-button>
    </p>

    <div class="grid grid-cols-12 gap-16">
        <div class="col-span-12 lg:col-span-8">

            {{-- Books list --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($this->books as $book)

                    <x-ui.library.book-card :book="$book" />

                @endforeach
            </div>

        </div>
        <div class="col-span-12 lg:col-span-4">

            {{-- Readings list --}}
            <div class="grid grid-cols-1 space-y-2">
                @foreach ($this->recentReadings as $reading)

                    <x-ui.library.reading-card-small :reading="$reading" />

                @endforeach
            </div>

            {{-- Reading Stats --}}
            <div class="relative mt-8">
                <p class="absolute top-0 ml-4 left-32 w-40 h-40 rounded-full bg-secondary-400 flex items-center justify-center text-center">
                    <span>
                        <span class="block mb-2 text-sm">Last Month</span>
                        <span class="block text-3xl font-semibold leading-7 px-8">{{ $this->readingStats['lastMonth'] }} <span class="font-light text-xl">minutes</span></span>
                    </span>
                </p>
                <p class="absolute top-0 left-0 w-40 h-40 rounded-full bg-highlight-400 flex items-center justify-center text-center">
                    <span>
                        <span class="block mb-2 text-sm">This month</span>
                        <span class="block text-3xl font-semibold leading-7 px-8">{{ $this->readingStats['thisMonth'] }} <span class="font-light text-xl">minutes</span></span>
                    </span>
                </p>
            </div>
        </div>

    </div>
</div>