{{--
    UI - Skills index / list
--}}
@use('App\Enums\Section')

<div class="space-y-4 lg:space-y-16">

    {{-- Header --}}
    <h1 class="text-3xl lg:text-6xl flex items-center gap-2">
        <x-icons.material class="text-3xl lg:text-6xl">{{ Section::Skills->getUiIcon() }}</x-icons-material>
        Skills
    </h1>

    <div class="grid lg:grid-cols-4 gap-8 lg:gap-16">
        <div class="lg:col-span-3 order-last lg:order-first">

            {{-- Group tabs --}}
            <div class="lg:flex items-center gap-0">
                @foreach ($this->skillGroups as $skillGroup)
                    <button wire:click="setSkillGroup('{{ $skillGroup->slug }}')"
                        @class([
                            'w-full lg:w-auto h-12 px-8 py-2 border border-primary-600 bg-primary-800 rounded-t-lg',
                            'bg-primary-900 text-primary-300 border-t-0 border-r-0 border-l-0 border-b-1 hover:bg-secondary-400 hover:text-primary-800' => $skillGroup->slug !== $this->selectedSkillGroup,
                            'text-secondary-400 border-b-0 font-semibold' => $skillGroup->slug === $this->selectedSkillGroup,

                        ])
                    >
                        {{ $skillGroup->name }}
                    </button>
                    <div class="hidden lg:block w-1 h-12 border-0 border-b border-primary-600"> </div>
                @endforeach
                <div class="hidden lg:block flex-1 h-12 border-0 border-b border-primary-600"> </div>
            </div>

            {{-- Skills --}}
            <div class="p-4 lg:p-8 border border-t-0 border-primary-600 bg-primary-800 rounded-b-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($this->skills as $skill)
                        <x-ui.skills.cards.wide :skill="$skill" />
                    @endforeach
                </div>
            </div>

        </div>
        <div class="text-primary-200 prose prose-secondary prose-sm lg:prose-base lg:pt-8">

            {{-- Sidebar text --}}
            @markdown(Settings::tryGetValue('skills_content') ?? '')

        </div>
    </div>
</div>

