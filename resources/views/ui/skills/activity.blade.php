{{--
    Livewire component to display recent activity for a skill with filter for time period.
--}}
@use('App\Enums\Section')
@use('App\Enums\SkillLogType')
@use('Illuminate\Support\Str')

<div>
    <x-ui.card class="p-4">

        <h3 class="text-4xl">Recent activity</h3>

        {{-- Period filter --}}
        <p class="text-xs mt-1">
            <x-ui.skills.activity-filter :currentPeriod="$this->getPeriod()" period="3">
                3 months
            </x-ui.skills.activity-filter> |

            <x-ui.skills.activity-filter :currentPeriod="$this->getPeriod()" period="6">
                6 months
            </x-ui.skills.activity-filter> |

            <x-ui.skills.activity-filter :currentPeriod="$this->getPeriod()" period="12">
                1 year
            </x-ui.skills.activity-filter> |

            <x-ui.skills.activity-filter :currentPeriod="$this->getPeriod()" period="500">
                All
            </x-ui.skills.activity-filter>
        </p>

        {{-- Activity totals --}}
        <p class="text-sm font-light mt-4">

            @if ($journeysCompleted > 0)
                <a href="#skillJourneys" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">task_alt</x-icons.material>
                    {{ $journeysCompleted }} skill {{ Str::plural('journey', $journeysCompleted) }}
                </a>
            @endif
            @if ($learningLogs > 0)
                <a href="#skillLogs" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">{{ SkillLogType::Learn->getUiIcon() }}</x-icons.material>
                    {{ $learningLogs }} learning {{ Str::plural('log', $learningLogs) }}
                </a>
            @endif
            @if ($useLogs > 0)
                <a href="#skillLogs" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">{{ SkillLogType::Use->getUiIcon() }}</x-icons.material>
                    {{ $useLogs }} usage {{ Str::plural('log', $useLogs) }}
                </a>
            @endif
            @if ($readings > 0)
                <a href="#books" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">local_library</x-icons.material>
                    {{ $readings }} reading {{ Str::plural('session', $readings) }}
                </a>
            @endif
            @if ($demos > 0)
                <a href="#projects" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">smart_toy</x-icons.material>
                    {{ $demos }} {{ Str::plural('demo', $demos) }} created
                </a>
            @endif
            @if ($projects > 0)
                <a href="#projects" class="block flex gap-2 items-center group/totals">
                    <x-icons.material class="text-base group-hover/totals:text-green-400">{{ Section::Projects->getUiIcon() }}</x-icons.material>
                    {{ $projects }} {{ Str::plural('project', $projects) }} started
                </a>
            @endif
        </p>

    </x-ui.card>
</div>