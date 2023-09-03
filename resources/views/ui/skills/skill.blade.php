{{--
    UI - View Skill
--}}
<div>

    <div class="border-b pb-4 md:pb-8 mb-4">
        <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center">
            <span class="flex-1">{{ $this->skill->name }}</span>
            @if ($skill->svg)
                <div class="w-16 h-16">
                    {!! $skill->svg !!}
                </div>
            @else
                <span class="hidden md:block material-icons-outlined text-6xl ml-1">construction</span>
            @endif
        </h1>
    </div>

    <p>
        @foreach ($skill->skillGroups as $skillGroup)
            <a class="border-r mr-2 pr-2 last:border-none" href="{{ route('skills', ['group' => $skillGroup->slug]) }}">{{ $skillGroup->name }}</a>
        @endforeach
    </p>

    <p>
        <x-ui.skills.stars :skill="$skill" />
        <p class="text-sm text-primary-500">Competent but may need some help...</p>
    </p>

    <div class="lg:grid lg:grid-cols-4 gap-x-16 mb-16">

        <div class="lg:col-span-3 space-y-8">

            {{-- Skill description --}}
            <div class="prose prose-xl prose-primary">
                @markdown($skill->description)
            </div>

            <img src="{{ $skill->image }}" class="w-full" />

        </div>

        {{-- Related links --}}
        <div class="text-right">
            <x-related.links :model="$skill" />
        </div>

    </div>

</div>
