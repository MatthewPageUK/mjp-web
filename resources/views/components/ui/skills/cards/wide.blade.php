{{--
    Shows a Skill in small wide card with logo, name and stars.
--}}
@props(['skill' => null])
@use('App\Enums\SkillLogType')

<x-ui.card>
    <div class="p-4">
        <a
            href="{{ $skill->routeUrl }}"
            title="About my {{ $skill->name }} skills"
            class="flex-1 block"
            >
            <span class="block font-bold text-xl group-hover/card:text-secondary-400">{{ $skill->name }}</span>
            <x-ui.skills.stars :skill="$skill" />
            <span class="block text-sm">{{ $skill->level->getGeneralLabel() }}</span>


            <p class="text-primary-300">
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
                    <x-icons.material class="text-base">rocket_launch</x-icons.material>
                @endif
            </p>

            <span class="block text-primary-500 text-xs">Last activity {{ $skill->skillLogs->last()?->date->diffForHumans() }}</span>

{{--
            <p class="text-xs text-primary-300 grid grid-cols-6 mt-4">

                <span class="block text-center group/stat" title="Skill journeys completed">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">task_alt</x-icons.material>
                    {{ $skill->skillJourneys->count() }}
                </span>

                <span class="block text-center group/stat" title="Learning logs">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">{{ SkillLogType::Learn->getUiIcon() }}</x-icons.material>
                    {{ $skill->skillLogs->where('type', SkillLogType::Learn)->count() }}
                </span>

                <span class="block text-center group/stat" title="Usage logs">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">{{ SkillLogType::Use->getUiIcon() }}</x-icons.material>
                    {{ $skill->skillLogs->where('type', SkillLogType::Use)->count() }}
                </span>

                <span class="block text-center group/stat" title="Reading sessions">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">local_library</x-icons.material>
                    {{ $skill->readingsCount }}
                </span>

                <span class="block text-center group/stat" title="Demos created">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">smart_toy</x-icons.material>
                    {{ $skill->demos->count() }}
                </span>

                <span class="block text-center group/stat" title="Projects created">
                    <x-icons.material class="block text-base group-hover/stat:text-green-500">rocket_launch</x-icons.material>
                    {{ $skill->projects->count() }}
                </span>

            </p> --}}


        </a>
    </div>
</x-ui.card>
