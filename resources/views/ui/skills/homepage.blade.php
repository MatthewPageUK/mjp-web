{{--
    UI - Skills - Homepage Widget
--}}
<div class="space-y-4 h-full">

    <div class="text-center md:text-left md:flex">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-secondary-400">
            <a
                class="hover:text-highlight-400"
                href="{{ route('skills') }}"
                title="View more of my skills"
            >Skills</a>
        </h1>

        <div class="text-sm">
            Group
            <x-ui.skills.selected-skill-group-filter :skillGroups="$this->skillGroups" />
        </div>
    </div>

    <div class="space-y-1">
        @foreach ($this->skills as $key => $skill)
            <x-ui.skills.cards.small-wide :skill="$skill" />
        @endforeach
    </div>

    <div>
        <x-ui.pagination-dots :paginator="$this->skills" />
    </div>

</div>
