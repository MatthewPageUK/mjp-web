<div x-data="{
    selectedDays: $persist([]),
    quoteOpen: false,
    togglePeriod(day, period) {
        this.quoteOpen = false
        if (this.isSelected(day, period)) {
            this.selectedDays = this.selectedDays.filter(item => item !== day + period)
        } else {
            this.selectedDays.push(day + period)
        }
    },
    toggleDay(day, am, pm) {
        this.quoteOpen = false

        if (! am || ! pm) {
            if (am) this.togglePeriod(day, 'am')
            if (pm) this.togglePeriod(day, 'pm')
        } else {
            if (this.isSelected(day, 'am') && this.isSelected(day, 'pm')) {
                if (am) this.togglePeriod(day, 'am')
                if (pm) this.togglePeriod(day, 'pm')
                return
            }

            if (! this.isSelected(day, 'am')) {
                if (am) this.togglePeriod(day, 'am')
            }
            if (! this.isSelected(day, 'pm')) {
                if (pm) this.togglePeriod(day, 'pm')
            }
        }
    },
    isSelected(day, period) {
        return this.selectedDays.includes(day + period)
    },
    hoursSelected() {
        return this.selectedDays.length * 3.5
    },
    daysSelected() {
        return this.selectedDays.length
    },
    firstDay() {
        this.selectedDays.sort((a, b) => {
            return new Date(a.substr(0, 10)) - new Date(b.substr(0, 10))
        })
        return new Date(this.selectedDays[0].substr(0, 10)).toLocaleDateString('en-GB')
    },
    lastDay() {
        this.selectedDays.sort((a, b) => {
            return new Date(a.substr(0, 10)) - new Date(b.substr(0, 10))
        })
        return new Date(this.selectedDays[this.selectedDays.length - 1].substr(0, 10)).toLocaleDateString('en-GB')
    },

}">
    <div class="md:grid grid-cols-12 mb-4">
        <div class="md:col-span-6 lg:col-span-8">
            <h1 class="text-5xl">Availability</h1>
            <p class="mt-2">Morning and afternoon periods are 3.5 hours each.</p>
        </div>

        <div class="md:col-span-6 lg:col-span-4 self-end">
            <template x-if="daysSelected() < 1">
                <div class="text-right font-semibold mr-2">
                    Click on a day or period to reserve the time slot
                </div>
            </template>

            {{-- Get a quote --}}
            <template x-if="daysSelected() > 0">
                <x-ui.card class="p-4 pb-2 md:fixed z-[100] md:top-32 mt-4 md:mt-0 border-2 w-full md:w-96">
                    <div class="md:flex XXitems-center gap-4 space-y-4 md:space-y-0">
                        <div class="md:flex-1">
                            <div class="grid grid-cols-12 items-center gap-1">
                                <p class="text-sm col-span-4">Hours</p>
                                <p class="col-span-8 font-bold" x-text="hoursSelected()"></p>



                                <span class="text-sm col-span-4" x-text="firstDay() === lastDay() ? 'On' : 'From' "></span>
                                <span class="text-sm col-span-8" x-text="firstDay()">...</span>

                                <span class="text-sm col-span-4" x-show="firstDay() !== lastDay()">To</span>
                                <span class="text-sm col-span-8" x-show="firstDay() !== lastDay()" x-text="lastDay()">...</span>

                            </div>
                        </div>
                        <div class="md:text-right" x-show="! quoteOpen">
                            <x-primary-button
                                x-on:click="quoteOpen = ! quoteOpen"
                                class="!bg-highlight-500"
                            >
                                Get a quote
                            </x-primary-button><br />

                            <button x-on:click="selectedDays = []" class="p-0 m-0 text-xs text-secondary-400 hover:text-secondary-600">Reset</button>
                        </div>
                    </div>

                    {{-- Quote form --}}
                    <div x-show="quoteOpen" class="mt-8">
                        <x-ui.availability.quote-form />
                    </div>
                </x-ui.card>
            </template>

        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        @foreach ($this->months as $month => $monthDate)

            {{-- Month --}}
            <x-ui.card class="px-8 py-4 pb-8">

                {{-- Name and year --}}
                <h2 class="text-3xl font-semibold mb-4 flex">
                    <span class="flex-1">{{ $monthDate->format('F') }}</span>
                    <span class="text-xl font-light">{{ $monthDate->format('Y') }}</span>
                </h2>

                <div class="grid grid-cols-4 md:grid-cols-7 gap-2">

                    {{-- Day names --}}
                    <x-ui.availability.calendar-day-names />

                    {{-- First day spacers --}}
                    @php($spacers = $monthDate->copy()->firstOfMonth()->dayOfWeek == 0 ? 6 : $monthDate->copy()->firstOfMonth()->dayOfWeek - 1)
                    @for ($i = 0; $i < $spacers; $i++)
                        <div class="hidden md:block"></div>
                    @endfor
                    {{-- Days in the month --}}
                    @foreach ($this->days->whereBetween('date', [$monthDate->format('Y-m-d'), $monthDate->copy()->endOfMonth()->addDay(1)->format('Y-m-d')]) as $day)
                        <div @class([
                            'border border-primary-600 rounded overflow-hidden',
                            'opacity-30' => $day->date->isPast() || ( ! $day->am && ! $day->pm ),
                            'hover:border-primary-400' => ! $day->date->isPast() && ( $day->am || $day->pm ),
                        ])>
                            {{-- Day number --}}
                            <x-ui.availability.day-toggle :day="$day" />

                            <div class="grid grid-cols-2">

                                {{-- AM period --}}
                                <x-ui.availability.period-toggle :day="$day" period="am" />

                                {{-- PM period --}}
                                <x-ui.availability.period-toggle :day="$day" period="pm" />

                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        @endforeach
    </div>
</div>
