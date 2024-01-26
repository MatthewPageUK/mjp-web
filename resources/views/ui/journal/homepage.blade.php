{{--
    UI - Journal - Homepage Widget
--}}
<div>
    <div class="space-y-4">
        <div class="text-center md:text-left md:flex">
            {{-- Widget title --}}
            <h1 class="flex-1 text-4xl font-black font-orbitron text-secondary-400">
                <a
                    class="hover:text-highlight-400"
                    href="{{ route('journal') }}"
                    title="View more journal entries"
                >Journal</a>
            </h1>
        </div>

        {{-- @todo Add skill filter --}}

        <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
            {{-- Entries --}}
            @php ($lastDate = null)
            @forelse ($this->entries as $entry)
                @if ($lastDate !== $entry->created_at->format('D M Y'))
                    @php ($lastDate = $entry->created_at->format('D M Y'))
                    {{-- @todo merge this and add outer font size? --}}
                    {{-- <x-ui.journal.day :entry="$entry" /> --}}
                    <div class="grid grid-cols-2">
                        @if ($lastDate === now()->format('D M Y'))
                            <span class="block text-secondary-400">Today</span>
                        @else
                            <span class="block text-secondary-400">
                                {{ $entry->created_at->format('l') }}
                            </span>
                            <span class="justify-self-end block text-secondary-400">
                                {{ $entry->created_at->format('j') }}<span class="font-light">{{ $entry->created_at->format('S') }}</span>
                            </span>
                        @endif
                    </div>
                @endif

                <p class="flex items-center space-x-4 border rounded-lg p-3 border-primary-500 bg-primary-800 hover:border-primary-700 hover:shadow-lg hover:bg-primary-700 hover:scale-105 transition transition-all duration-500 ease-in-out">
                    @switch (get_class($entry))

                        @case('App\Models\SkillLog')
                            <x-ui.journal.skill-log :skillLog="$entry" />
                            @break

                        @case('App\Models\SkillJourney')
                            <x-ui.journal.skill-journey :skillJourney="$entry" />
                            @break

                        @case('App\Models\Demo')
                            <x-ui.journal.demo :demo="$entry" />
                            @break

                        @case('App\Models\Reading')
                            <x-ui.journal.reading :reading="$entry" />
                            @break

                    @endswitch
                </p>
            @empty
                <p>Sorry, no journal entries where found.</p>
            @endforelse

        </div>

        <div class="text-right">
            <a
                href="{{ route('journal') }}" class="text-secondary-400 hover:text-highlight-400"
                title="Read more journal entries"
            >
                Read more...
            </a>
        </div>

    </div>
</div>
