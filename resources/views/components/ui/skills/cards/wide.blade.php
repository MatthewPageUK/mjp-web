{{--
    Shows a Skill in small wide card with logo, name and stars.
--}}
@props(['skill' => null])
@use('App\Enums\SkillLogType')
@use('App\Enums\Section')

<x-ui.card>
    <div class="p-4">
        <a
            href="{{ $skill->routeUrl }}"
            title="About my {{ $skill->name }} skills"
            class="flex-1 block"
            >
            <span class="block font-bold text-2xl group-hover/card:text-secondary-400">{{ $skill->name }}</span>

            {{-- <x-ui.skills.stars :skill="$skill" /> --}}

            <span class="block text-sm">{{ $skill->level->getGeneralLabel() }}</span>

            <p class="text-amber-600 dark:text-primary-300">
                @if ($skill->skillJourneys->count() > 0)
                    <x-icons.material class="text-base">task_alt</x-icons.material>
                @endif

                @if ($skill->skillLogs->where('type', SkillLogType::Learn)->count() > 0)
                    <x-icons.material class="text-base">{{ SkillLogType::Learn->getUiIcon() }}</x-icons.material>
                @endif

                @if ($skill->skillLogs->where('type', SkillLogType::Use)->count() > 0)
                    <x-icons.material class="text-base">{{ SkillLogType::Use->getUiIcon() }}</x-icons.material>
                @endif

                @if ($skill->readingsCount > 0)
                    <x-icons.material class="text-base">local_library</x-icons.material>
                @endif

                @if ($skill->demos->count() > 0)
                    <x-icons.material class="text-base">smart_toy</x-icons.material>
                @endif

                @if ($skill->projects->count() > 0)
                    <x-icons.material class="text-base">{{ Section::Projects->getUiIcon() }}</x-icons.material>
                @endif
            </p>

            <span class="block text-primary-500 text-xs">Last used {{ $skill->lastUsed?->diffForHumans() }}</span>

        </a>
    </div>
</x-ui.card>
