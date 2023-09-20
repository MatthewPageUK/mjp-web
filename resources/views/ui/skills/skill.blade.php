{{--
    UI - View Skill
--}}
<div>
    <div class="mb-8">
        <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center gap-2">
            <span class="flex-1">{{ $this->skill->name }}</span>
            @if ($skill->svg)
                <div class="w-16 h-16">
                    {!! $skill->svg !!}
                </div>
            @else
                <x-icons.material class="hidden md:block text-6xl">construction</x-icons.material>
            @endif
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-4 gap-16 mb-16">

        <div class="lg:col-span-3 space-y-8">

            <div class="space-y-1">
                <p>
                    @foreach ($skill->skillGroups as $skillGroup)
                        <a class="border-r mr-2 pr-2 last:border-none" href="{{ route('skills', ['group' => $skillGroup->slug]) }}">{{ $skillGroup->name }}</a>
                    @endforeach
                </p>

                <p>
                    <x-ui.skills.stars :skill="$skill" />
                    <p class="text-sm text-primary-500">Competent but may need some help...</p>
                </p>
            </div>
            {{-- Skill description --}}
            <div class="prose prose-xl prose-primary w-full max-w-none">
                @markdown($skill->description)
            </div>

            {{-- Image --}}
            <x-ui.imageable :model="$skill" />

        </div>

        <div>
            {{-- Skill Journey --}}
            <h3 class="text-3xl mb-4 font-black">Skill Journey</h3>

            <ul class="h-96 text-sm space-y-2 overflow-y-auto pr-2">
                @foreach ($journeys as $journey)
                    <li class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded-full bg-white"> </div>
                        <span class="flex-1">{{ $journey->name }}</span>
                    </li>
                @endforeach

                <li class="border-b pb-1"></li>

                @foreach ($journeysCompleted as $journey)
                    <li class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded-full bg-green-400">
                            <x-icons.material class="text-sm">tick</x-icons.material>
                        </div>
                        <p class="flex-1">{{ $journey->name }}
                            <span class="text-xs block text-green-400">Completed on {{ $journey->completed_at }}</span>
                        </p>
                    </li>
                @endforeach

            </ul>

        </div>

        <div class="col-span-2">
            <livewire:ui.demo.widget :selectedSkill="$skill->slug" :selectableSkill="false" title="{{ $skill->name }} Demos"/>
        </div>

        <div class="col-span-2">
            <livewire:ui.project.widget :selectedSkill="$skill->slug" :selectableSkill="false" title="{{ $skill->name }} Projects"/>
        </div>

        <div class="col-span-4">
            <livewire:ui.post.widget :selectedSkill="$skill->slug" :selectableSkill="false" title="{{ $skill->name }} Posts"/>
        </div>
    </div>

</div>
