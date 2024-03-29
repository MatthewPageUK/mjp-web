{{--
    UI - Projects - Homepage Widget
--}}
<div>
    @if ($this->projects->count() > 0)
        <div class="space-y-4">
            <div class="text-center md:text-left md:flex">
                <h1 class="flex-1 text-4xl font-black text-amber-700 dark:text-secondary-400">
                    <a
                        class="hover:text-highlight-400"
                        href="{{ route('projects') }}"
                        title="View more of my projects"
                    >{{ $this->title }}</a>
                </h1>
                @if ($this->selectableSkill)
                    <div class="text-sm">
                        Using
                        <x-ui.skills.selected-skill-filter :skills="$this->skills" />
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($this->projects as $key => $project)
                    <x-ui.projects.cards.small :project="$project" />
                @endforeach
            </div>

            <div>
                <x-ui.pagination-dots :paginator="$this->projects" />
            </div>
        </div>
    @endif
</div>
