{{--
    UI - Skills index / list
--}}
<div class="space-y-16 group">
    <div class="md:flex items-center gap-8 space-y-8 md:space-y-0">
        <div class="flex-1">
            <h1 class="font-orbitron font-black text-5xl flex items-center gap-2">
                <x-icons.material class="text-6xl group-hover:text-highlight-500 transition-all duration-500">construction</x-icons-material>
                <span>
                    @if ($this->skillGroup)
                        {{ $this->skillGroup->name }}
                    @endif
                </span>
                Skills
            </h1>
        </div>

        <div class="flex items-center gap-2">
            <h2 class="">Skills Group</h2>
            <x-ui.skills.selected-skill-group-filter :skillGroups="$this->skillGroups" />
        </div>
    </div>

    {{-- <p class="text-xl">{{ $this->intro }}</p> --}}

    <div class="grid grid-cols-3 gap-x-16">

        <div class="col-span-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($this->skills as $skill)
                    <x-ui.skills.cards.wide :skill="$skill" />
                @endforeach
            </div>
        </div>

        <div class="text-primary-200 prose prose-secondary">

            @markdown(Settings::getValue('skills_content'))

        </div>
    </div>
</div>

