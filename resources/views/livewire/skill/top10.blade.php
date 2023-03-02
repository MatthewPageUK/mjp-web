<div>
    <h1 class="text-5xl">Skills Top 10</h1>
    <p>
        <select wire:model="group">
            <option value="">All</option>
            @foreach ($this->groups as $skillGroup)
                <option value="{{ $skillGroup->id }}">{{ $skillGroup->name }}</option>
            @endforeach
        </select>
    </p>

    <div class="grid grid-cols-2 bg-white">
        @foreach ($this->skills as $skill)
            <div class="">
                <p class="p-4 m-2 border rounded-lg bg-zinc-800 text-white text-center">
                    <a href="skill">
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
            More skills
        </div>

    </div>
</div>
