<x-ui-layout>

    <div class="border-b pb-8 mb-16">
        <h1 class="text-6xl font-black">Projects</h1>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-x-16">

        <div>
            {{-- Project name --}}
            <h1 class="text-5xl mb-2 font-bold">
                <span class="material-icons-outlined text-4xl ml-1">rocket_launch</span>
                {{ $project->name }}
            </h1>

            {{-- Last update --}}
            <p class="text-xs text-zinc-500">
                Last update : {{ $project->updated_at->diffForHumans() }}
            </p>

            {{-- Project description --}}
            <div class="prose prose-xl prose-zinc">
                @markdown($project->description)
            </div>

            {{-- Link to Github page --}}
            @if ($project->github)
                <p class="pt-8">
                    <a href="{{ $project->github }}" target="_blank">
                        <span class="flex">
                            <span class="material-icons-outlined mr-1">open_in_browser</span>
                            Github
                        </span>
                        <span class="text-xs">{{ $project->github }}</span>
                    </a>
                </p>
            @endif

            {{-- Link to project web site --}}
            @if ($project->website)
                <p class="pt-8">
                    <a href="{{ $project->website }}" target="_blank">
                        <span class="flex">
                            <span class="material-icons-outlined mr-1">open_in_browser</span>
                            Project Website
                        </span>
                        <span class="text-xs">{{ $project->website }}</span>
                    </a>
                </p>
            @endif
        </div>

        <div class="text-right">

            <x-related.links :model="$project" />

        </div>

    </div>

</x-ui-layout>
