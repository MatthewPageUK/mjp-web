{{--
    UI - View Skill
--}}
<div>

    <div class="border-b pb-4 md:pb-8 mb-4">
        <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center">
            <span class="flex-1">{{ $this->skill->name }}</span>
            @if ($skill->svg)
                <div class="w-16 h-16">
                    {!! $skill->svg !!}
                </div>
            @else
                <span class="hidden md:block material-icons-outlined text-6xl ml-1">construction</span>
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

            <h3 class="text-2xl">Rate my skill</h3>
            <div class="grid grid-cols-4 gap-2 text-xs text-center">
                <x-primary-button>-1</x-primary-button>
                <x-primary-button class="col-span-2">About right</x-primary-button>
                <x-primary-button>+1</x-primary-button>
            </div>

            <h3 class="text-2xl my-4">Skill Journey</h3>

            <ul class="h-64 text-sm space-y-2 overflow-y-auto pr-2">
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-white border border-black"> </div>
                    <span>Setup some more tunnels</span>
                </li>
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-white border border-black"> </div>
                    <span>Read documentation on advanced use</span>
                </li>

                <li class="border-b pb-1"></li>

                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Setup a tunnel and share demo site
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="block w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Install the app
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Setup a tunnel and share demo site
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="block w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Install the app
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Setup a tunnel and share demo site
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="block w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Install the app
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Setup a tunnel and share demo site
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="block w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Install the app
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Setup a tunnel and share demo site
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
                <li class="flex items-center gap-2">
                    <div class="block w-4 h-4 rounded-full bg-green-400 border border-black"> </div>
                    <p>Install the app
                        <span class="text-xs block text-green-400">Completed 12/09/2023</span>
                    </p>
                </li>
            </ul>

            {{-- <x-related.links :model="$skill" /> --}}
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
