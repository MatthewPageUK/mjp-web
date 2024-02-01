{{--
    UI - Projects index / list
--}}
@use('App\Enums\Section')
<div class="space-y-8">
    <div class="md:flex items-start gap-8 space-y-8 md:space-y-0">
        <div class="flex-1 space-y-8 group">
            <h1 class="text-6xl flex items-center gap-2">
                <x-icons.material class="text-6xl group-hover:animate-spin group-hover:text-5xl group-hover:text-highlight-500 transition-all duration-500">{{ Section::Projects->getUiIcon() }}</x-icons-material>
                Projects
            </h1>
            <div class="prose prose-lg prose-primary">
                @markdown($this->intro ?? '')
            </div>
        </div>

        <div class="flex items-center gap-2">
            <h2 class="">Using</h2>
            <x-ui.skills.selected-skill-filter :skills="$this->skills" />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        @foreach ($this->projects as $project)
            <x-ui.projects.cards.wide :project="$project" />
        @endforeach
    </div>
</div>
