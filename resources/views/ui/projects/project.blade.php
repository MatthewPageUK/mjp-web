{{--
    UI - View Project
--}}
@use('App\Enums\Section')
<div>

    <div class="border-b pb-4 md:pb-8 mb-8">
        <h1 class="text-2xl md:text-5xl tracking-tight flex items-center">
            <span class="flex-1">{{ $this->project->name }}</span>
            <x-icons.material class="hidden md:block text-6xl ml-1">{{ Section::Projects->getUiIcon() }}</x-icons.material>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-4 gap-x-16 mb-16">

        <div class="lg:col-span-3 space-y-8">

            {{-- Project description --}}
            <div class="prose prose-lg prose-primary max-w-full">
                @markdown($project->description ?? '')
            </div>

            {{-- Image --}}
            @if ($project->website)
                <a href="{{ $project->website }}" target="_blank">
                    <x-ui.imageable :model="$project" />
                </a>
            @else
                <x-ui.imageable :model="$project" />
            @endif

        </div>


        <div class="space-y-4">
            {{-- Project details --}}
            <x-ui.card class="p-4 grid grid-cols-2 text-xs gap-y-2">

                <div>Last activity</div>
                <div class="text-right">{{ $project->last_active?->diffForHumans() }}</div>

                <div>Created</div>
                <div class="text-right">{{ $project->created_at?->format('M d, Y') }}</div>

                <div>Updated</div>
                <div class="text-right">{{ $project->updated_at?->format('M d, Y') }}</div>

            </x-ui.card>

            {{-- Link to project web site --}}
            @if ($project->website)
            <x-ui.card class="p-4">
                <x-ui.external-link href="{{ $project->website }}" title="Project Website" />
            </x-ui.card>
            @endif

            {{-- Skills used --}}
            <div>
                <h2 class="text-4xl mb-4 flex items-center gap-2">
                    <x-icons.material class="text-3xl">{{ Section::Skills->getUiIcon() }}</x-icons.material>
                    Skills used
                </h2>
                <div class="flex flex-wrap gap-2">
                    @foreach ($project->skills as $skill)
                        <x-primary-button href="{{ $skill->routeUrl }}" title="" class="text-sm">
                            {{ $skill->name }}
                        </x-primary-button>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    <div>
        @if ($project->hasGithubRepo())
            <div>
                {{-- Github project panel --}}
                <livewire:github.repo :model="$project" />
            </div>
        @endif
    </div>

</div>
