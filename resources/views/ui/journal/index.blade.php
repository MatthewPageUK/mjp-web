{{--
    UI - Journal index / list
--}}
<div class="space-y-8">

    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-16">

        <div class="col-span-8">
            <h2 class="text-5xl text-center">{{ date("F", mktime(0, 0, 0, $this->month, 10)) }} {{ $this->year }}</h2>
            <h3 class="text-2xl text-center mb-8 font-light">Developer Journal</h3>

            {{-- Entries --}}
            @php ($lastDate = null)
            @forelse ($this->entries as $entry)
                @if ($lastDate !== $entry->created_at->format('D M Y'))
                    @php ($lastDate = $entry->created_at->format('D M Y'))
                    <x-ui.journal.day :entry="$entry" />
                @endif

                <p class="flex items-center space-x-4 border rounded-lg p-3 mb-2 border-primary-500 bg-primary-800 hover:border-primary-700 hover:shadow-lg hover:bg-primary-700 hover:scale-105 transition transition-all duration-500 ease-in-out">
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

                    @endswitch
                </p>
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
