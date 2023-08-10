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

    <div class="grid grid-cols-3 gap-x-16">


    {{-- Skills block --}}
    <div class="col-span-2 sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($this->skills as $key => $skill)

            {{-- Skills --}}
            <div
                class="text-center border rounded-lg hover:bg-zinc-700 mb-1"
                wire:key="skill-{{ $skill->slug }}"
            >
                <a
                    href="{{ $skill->url }}"
                    title="About my {{ $skill->name }} skills"
                    class="block p-4"
                >
                    <span class="block font-bold text-lg">{{ $skill->name }}</span>
                    <x-skills.stars :skill="$skill" />
                </a>
            </div>

        @endforeach

    </div>

    <div class="text-zinc-200">

        <h2>Skill Rating Multiplier</h2>
        <p>
            To help compare to other developers I've include a skill multiplier value. This increases over time as I gain experience in the field for web development.
            It is assigned at 1 point per 5 years (estimated 10,000 hours of experience)
            My Score : 4
        </p>

        <h2 class="text-xl font-semibold my-4">Subjective skill ratings</h2>
        <h3 class="font-semibold my-4">1 - 3 : Junior</h3>
        <p>
            Able to get up and running and develop simple features with guidance and support of a more senior developer.
        </p>

        <h3 class="font-semibold my-4">4 - 6 : Mid </h2>

            Able to develop more complex features and bug fixing with minimal guidance and support of a more senior developer. Can offer support and guidance to junior developers.

            7 - 9 : Senior<br />

            Able to develop complex features and bug fixing with no guidance and support of a more senior developer. Can offer support and guidance to junior and mid developers.

            10 : Master<br />

            Best left alone to do what they're doing. A master must be singularly focused on a single tech stack item.
        </p>

        <h2>Skill Decay</h2>
        <p>Skills I have not used for a while will decay over time. 1 skill point will be lost per 6 months, down to a minimum of 5 points.</p>



    </div>

</div>
