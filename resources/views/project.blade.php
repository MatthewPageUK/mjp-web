<x-ui-layout :title="$project->name">

    {{-- Project name --}}
    <div class="border-b pb-8 mb-4">
        <h1 class="text-6xl font-black flex items-center">
            <span class="flex-1">{{ $project->name }}</span>
            <span class="material-icons-outlined text-6xl ml-1">rocket_launch</span>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-4 gap-x-16 mb-16">

        <div class="lg:col-span-3">

            {{-- Project description --}}
            <div class="prose prose-xl prose-primary">
                @markdown($project->description)
            </div>

            <img src="https://loremflickr.com/640/400/software?random=3487143{{ $project->id }}" class="w-full my-8" />

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

        {{-- Related links --}}
        <div class="text-right">
            <x-related.links :model="$project" />
        </div>

    </div>

    {{-- Github project panel --}}
    <livewire:github.repo :project="$project" />

</x-ui-layout>
