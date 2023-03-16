{{--
    Skills Explorer
    ---------------
    This component is used to display a list of skills and allow the user to filter them by group.

--}}
<div>
    {{-- Title --}}
    <h1 class="text-4xl text-center md:text-5xl lg:text-6xl">{{ __('Skills Explorer') }}</h1>

    {{-- Skill Groups drop down list --}}
    @if ($this->groups->count() > 0)
        <div class="flex items-center my-8 py-4 border-t border-b">
            <h2 class="flex-1 text-left mr-2">{{ __('Skill Group') }}</h2>

            <select
                wire:model="group"
                class="rounded bg-zinc-800"
            >
                <option value="">All</option>

                @foreach($this->groups as $group)

                    <option
                        class="bg-zinc-800"
                        value="{{ $group->slug }}"
                        wire:key="group-{{ $group->slug }}"
                    >{{ $group->name }}</option>

                @endforeach

            </select>
        </div>
    @endif

    {{-- Skills block --}}
    <div class="sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($this->skills as $key => $skill)

            {{-- Skills --}}
            <div
                class="text-center border rounded-lg hover:bg-zinc-700 mb-1"
                wire:key="skill-{{ $skill->slug }}"
            >
                <a
                    href="{{ route('skill', $skill) }}"
                    title="About my {{ $skill->name }} skills"
                    class="block p-4"
                >
                    <span class="block font-bold text-lg">{{ $skill->name }}</span>
                    <x-skills.stars :skill="$skill" />
                </a>
            </div>

        @endforeach

    </div>

    <div class="text-xs mt-8 text-zinc-500">
        Skill Stars Key <br />
        1 - 3 : Junior <br />
        4 - 6 : Mid <br />
        7 - 9 : Profesional<br />
        10 : Master<br />

    </div>

</div>
