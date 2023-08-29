{{--
    UI - Demos - Homepage Widget
--}}
<div class="space-y-4">
    <div class="text-center md:text-left md:flex">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-secondary-400">
            <a
                class="hover:text-highlight-400"
                href="{{ route('demos') }}"
                title="View more of my demos"
            >Demos</a>
        </h1>

        <div class="text-sm">
            Using
            <x-ui.skills.selected-skill-filter :skills="$this->skills" />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($this->demos as $key => $demo)
            <x-ui.demos.cards.small :demo="$demo" />
        @endforeach
    </div>

    <div>
        <x-ui.pagination-dots :paginator="$this->demos" />
    </div>
</div>
