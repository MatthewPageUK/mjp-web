{{--
    UI - Skills index / list
--}}
<div class="space-y-16 group">
    <div class="md:flex items-center gap-8 space-y-8 md:space-y-0">
        <div class="flex-1">
            <h1 class="font-orbitron font-black text-5xl flex items-center gap-2">
                <x-icons.material class="text-6xl group-hover:text-highlight-500 transition-all duration-500">construction</x-icons-material>
                Skills
            </h1>
        </div>

        {{-- <div class="flex items-center gap-2">
            <h2 class="">Skills Group</h2>
            <x-ui.skills.selected-skill-group-filter :skillGroups="$this->skillGroups" />
        </div> --}}
    </div>

    <div class="grid grid-cols-3 gap-x-16">

        <div class="col-span-2">

            <div class="flex items-center gap-0">
                @foreach ($this->skillGroups as $skillGroup)
                    <button wire:click="setSkillGroup('{{ $skillGroup->slug }}')"
                        @class([
                            'h-12 px-8 py-2 border border-primary-600 bg-primary-800 rounded-t-lg',
                            'bg-primary-900 text-primary-300 border-t-0 border-r-0 border-l-0 border-b-1 hover:bg-secondary-400 hover:text-primary-800' => $skillGroup->slug !== $this->selectedSkillGroup,
                            'text-secondary-400 border-b-0 font-semibold' => $skillGroup->slug === $this->selectedSkillGroup,

                        ])
                    >
                        {{ $skillGroup->name }}
                    </button>
                    <div class="w-1 h-12 border-0 border-b border-primary-600"> </div>
                @endforeach
                <div class="flex-1 h-12 border-0 border-b border-primary-600"> </div>
            </div>
            <div class="p-8 border border-t-0 border-primary-600 bg-primary-800 rounded-b-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($this->skills as $skill)
                        <x-ui.skills.cards.wide :skill="$skill" />
                    @endforeach
                </div>
            </div>

        </div>

        <div class="text-primary-200 prose prose-secondary">

            @markdown(Settings::getValue('skills_content'))

        </div>
    </div>
</div>

