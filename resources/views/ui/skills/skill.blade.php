{{--
    UI - View Skill
--}}
@use('App\Enums\SkillLogType')
@use('App\Enums\Section')
<div class="space-y-6">

    {{-- Header --}}
    <h1 class="font-orbitron font-black text-6xl flex items-center gap-2">
        <span class="flex-1">{{ $this->skill->name }}</span>
        <a href="{{ route('skills', ['group' => $this->skill->skillGroups->first()->slug]) }}" class="hover:text-secondary-400" title="Back to the skills index">
            <x-icons.material class="hidden md:block text-6xl">{{ Section::Skills->getUiIcon() }}</x-icons.material>
        </a>
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-16 mb-16">
        <div class="lg:col-span-2 space-y-8 order-last lg:order-first">

            <div class="space-y-1">
                {{-- Skill groups --}}
                <p>
                    @foreach ($skill->skillGroups as $skillGroup)
                        <a class="border-r mr-2 pr-2 last:border-none" href="{{ route('skills', ['group' => $skillGroup->slug]) }}">{{ $skillGroup->name }}</a>
                    @endforeach
                </p>

                {{-- Stars and general label --}}
                <p>
                    <x-ui.skills.stars :skill="$skill" />
                    <p class="text-sm text-primary-300">{{ $skill->level->getGeneralLabel() }} - {{ $skill->level->getDescription() }}</p>
                </p>
            </div>

            {{-- Skill description --}}
            @if ($skill->description)
                <div class="prose prose-lg prose-primary w-full max-w-none">
                    @markdown($skill->description ?? '')
                </div>
            @endif

            {{-- Image --}}
            <x-ui.imageable :model="$skill" />

            {{-- Projects and Demos --}}
            @if ($skill->demos->count() + $skill->projects->count() > 0)
                <div class="relative">
                    <a name="projects" class="absolute -top-32"></a>
                    <h3 class="text-5xl mb-8 mt-8">Projects and Demos</h3>
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-4">
                        @foreach ($skill->demos->concat($skill->projects)->sortByDesc('created_at') as $item)
                            @if ($item instanceof App\Models\Demo)
                                <x-ui.demos.cards.small :demo="$item" />
                            @elseif ($item instanceof App\Models\Project)
                                <x-ui.projects.cards.small :project="$item" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Books --}}
            <div class="relative">
                <a name="books" class="absolute -top-32"></a>
                <h3 class="text-5xl mb-8 mt-8">Books</h3>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                    @foreach ($skill->books as $book)
                        <x-ui.library.book-card :book="$book" />
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-span-1 space-y-4">

            {{-- Recent activity --}}
            <livewire:ui.skill.activity :skill="$skill"/>

            {{-- Skill Journey --}}
            @if ($this->hasSkillJourneys())
                <x-ui.card class="p-4 relative">
                    <a name="skillJourneys" class="absolute -top-32"></a>
                    <h3 class="text-4xl mb-4">Skill Journey</h3>

                    <ul class="max-h-96 text-sm space-y-2 overflow-y-auto pr-2">
                        @if ($this->hasIncompleteSkillJourneys())
                            @foreach ($journeys as $journey)
                                <li class="flex items-center gap-2">
                                    <x-icons.material class="text-base text-primary-300">circle</x-icons.material>
                                    <span class="flex-1 leading-tight">{{ $journey->name }}</span>
                                </li>
                            @endforeach
                            <li class="border-b border-primary-500 pb-1"></li>
                        @endif
                        @foreach ($journeysCompleted as $journey)
                            <li class="flex gap-2">
                                <x-icons.material class="text-base text-green-500">task_alt</x-icons.material>
                                <p class="flex-1 leading-tight">
                                    {{ $journey->name }}
                                    <span class="flex text-xs block text-primary-500">
                                        <span class="flex-1">{{ $journey->completed_at->format('dS F Y') }}</span>
                                        <span>{{ $journey->completed_at->diffForHumans() }}</span>
                                    </span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </x-ui.card>
            @endif

            {{-- Skill Log --}}
            @if ($skill->skillLogs->count() > 0)
                <x-ui.card class="p-4 relative">
                    <a name="skillLogs" class="absolute -top-32"></a>
                    <h3 class="text-4xl mb-4">Skill Log</h3>

                    <ul class="max-h-96 text-sm space-y-2 overflow-y-auto pr-2">
                        @php ($lastDate = null)
                        @foreach ($skill->skillLogs as $log)
                            <li class="flex items-center gap-2">
                                <p class="flex-1">
                                    @if ($lastDate !== $log->date->format('D M Y'))
                                        @php ($lastDate = $log->date->format('D M Y'))
                                        <span class="text-xs block border-b pb-1 mb-1 text-secondary-400">{{ $log->date->format('d M Y') }}</span>
                                    @endif

                                    <span class="flex gap-1">
                                        <x-icons.material class="text-sm mr-1">{{ $log->type->getUiIcon() }}</x-icons.material>
                                        <span class="flex-1 leading-tight">
                                            {{ $log->description }}<br />
                                            <span class="text-primary-500 text-xs">{{ $log->level->getLabel() }} ({{ $log->duration }})</span>
                                        </span>
                                    </span>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </x-ui.card>
            @endif

        </div>

        {{-- <div class="lg:col-span-3">
            <livewire:ui.post.widget :selectedSkill="$skill->slug" :selectableSkill="false" title="{{ $skill->name }} Posts"/>
        </div> --}}

    </div>
</div>
