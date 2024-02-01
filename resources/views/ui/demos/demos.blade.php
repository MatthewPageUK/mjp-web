{{--
    UI - Demos index / list
--}}
<div class="space-y-8">
    <div class="md:flex items-start gap-8 space-y-8 md:space-y-0">
        <div class="flex-1 space-y-8 group">
            {{-- Page title --}}
            <h1 class="text-6xl flex items-center gap-2">
                <x-icons.material
                    class="text-6xl group-hover:animate-bounce group-hover:text-6xl group-hover:text-highlight-500 transition-all duration-500"
                >smart_toy</x-icons-material>

                Demos
            </h1>
            {{-- Introduction text --}}
            <p class="text-xl">{{ $this->intro }}</p>
        </div>

        {{-- Skill selector drop down --}}
        <div class="flex items-center gap-2">
            <h2 class="">Using</h2>
            <x-ui.skills.selected-skill-filter :skills="$this->skills" />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
        {{-- Demos --}}
        @forelse ($this->demos as $demo)
            <x-ui.demos.cards.wide :demo="$demo" />
        @empty
            <p>Sorry, no demos where found.</p>
        @endforelse
    </div>
</div>
