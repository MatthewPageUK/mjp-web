{{--
    UI - Journal index / list
--}}
<div class="space-y-8">

    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-16">

        <div class="col-span-8">
            <h2 class="text-6xl text-center">{{ date("F", mktime(0, 0, 0, $this->month, 10)) }} {{ $this->year }}</h2>
            <h3 class="text-2xl text-center mb-8 font-light">Developer Journal</h3>

            {{-- Entries --}}
            @php ($lastDate = null)
            @forelse ($this->entries as $entry)
                @if ($lastDate !== $entry->created_at->format('d m Y'))
                    @php ($lastDate = $entry->created_at->format('d m Y'))
                    <x-ui.journal.day :entry="$entry" />
                @endif

                <x-ui.card class="flex items-center space-x-4 p-3 mb-2">
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

                        @default
                            <p>Sorry, no entry type was found.</p>
                            {{ $entry }}
                            {{ get_class($entry) }}

                    @endswitch
                </x-ui.card>

            @empty
                <p>Sorry, no entries where found.</p>
            @endforelse
        </div>

        {{-- Navigation / year and month selector --}}
        <div class="col-span-4 relative">
            <div>
                @foreach ($this->years as $year)
                    <x-ui.journal.nav-year
                        :year="$year->value"
                        :total="$year->total"
                        :current="$this->year"
                    >
                        @if ($this->year === $year->value)
                            <div class="mt-2">
                                @foreach ($this->months as $month)
                                    <x-ui.journal.nav-month
                                        :year="$year->value"
                                        :month="$month->value"
                                        :total="$month->total"
                                        :current="$this->month"
                                    />
                                @endforeach
                            </div>
                        @endif
                    </x-ui.journal.nav-year>
                @endforeach
            </div>
        </div>
    </div>
</div>
