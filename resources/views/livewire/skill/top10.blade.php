<div>
    <h1 class="text-5xl text-center mb-2">Top 10 Skills</h1>
    <p class="text-center">
        <select wire:model="group" class="bg-zinc-800 text-xs">
            <option value="">All</option>
            @foreach ($this->groups as $skillGroup)
                <option value="{{ $skillGroup->id }}">{{ $skillGroup->name }}</option>
            @endforeach
        </select>
    </p>

    <div class="md:grid md:grid-cols-2">
        @foreach ($this->skills as $key => $skill)
            {{-- @if ($key == 2)
                <div class="">
                    <button>Show more skills</button>
                </div>
            @endif --}}
            <div class="">
                <p class=" text-center">
                    <a href="skill" class="block p-4 m-2 border rounded-lg bg-zinc-800 hover:bg-zinc-700">
                        <span class="block text-lg">{{ $skill->name }}</span>
                        @for ($x = 0; $x < 10; $x++)
                            @if ($x >= $skill->level)
                                <span class="material-icons-outlined text-zinc-600 text-lg">star_rate</span>
                            @else
                                <span class="material-icons-outlined text-amber-400 text-lg">star_rate</span>
                            @endif
                        @endfor
                    </a>
                </p>
            </div>
        @endforeach

        <div>
            Skills Explorer  |  Skill Levels Key
        </div>

    </div>
</div>
