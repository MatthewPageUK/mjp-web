{{--
    UI - Journal - Homepage Widget
--}}
<div>
    <div class="space-y-4">
        <div class="text-center md:text-left md:flex">
            {{-- Widget title --}}
            <h1 class="flex-1 text-6xl md:text-4xl md:font-black text-amber-700 dark:text-secondary-400">
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
                @if ($lastDate !== $entry->journal_date->format('d m Y'))
                    @php ($lastDate = $entry->journal_date->format('d m Y'))
                    {{-- @todo merge this and add outer font size? --}}
                    {{-- <x-ui.journal.day :entry="$entry" /> --}}
                    <div class="grid grid-cols-2">
                        @if ($lastDate === now()->format('d m Y'))
                            <span class="block text-amber-700 dark:text-secondary-400">Today</span>
                        @else
                            <span class="block text-amber-700 dark:text-secondary-400">
                                {{ $entry->journal_date->format('l') }}
                            </span>
                            <span class="justify-self-end block text-amber-700 dark:text-secondary-400">
                                {{ $entry->journal_date->format('j') }}<span class="font-light">{{ $entry->journal_date->format('S') }}</span>
                            </span>
                        @endif
                    </div>
                @endif

                <x-ui.card class="flex items-center space-x-4 p-3">
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

                        @case('App\Models\Project')
                            <x-ui.journal.project :project="$entry" />
                            @break

                    @endswitch
                </x-ui.card>
            @empty
                <p>Sorry, no journal entries where found.</p>
            @endforelse

        </div>

        <div class="text-right">
            <a
                href="{{ route('journal') }}" class="text-amber-700 dark:text-secondary-400 hover:text-highlight-400"
                title="Read more journal entries"
            >
                Read more...
            </a>
        </div>

    </div>
</div>
