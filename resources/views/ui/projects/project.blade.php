{{--
    UI - View Project
--}}
<div>

    <div class="border-b pb-4 md:pb-8 mb-4">
        <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center">
            <span class="flex-1">{{ $this->project->name }}</span>
            <span class="hidden md:block material-icons-outlined text-6xl ml-1">rocket_launch</span>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-4 gap-x-16 mb-16">

        <div class="lg:col-span-3 space-y-8">

            {{-- Project description --}}
            <div class="prose prose-xl prose-primary">
                @markdown($project->description)
            </div>

            <x-ui.imageable :model="$project" />

            {{-- Link to Github page --}}
            @if ($project->github)
                <x-ui.external-link href="{{ $project->github }}" title="Github" />
            @endif

            {{-- Link to project web site --}}
            @if ($project->website)
                <x-ui.external-link href="{{ $project->website }}" title="Project Website" />
            @endif
        </div>

        {{-- Related links --}}
        <div class="text-right">
            <x-related.links :model="$project" />
        </div>

    </div>

    {{-- Github project panel --}}
    <livewire:github.repo :project="$project" />

</div>
