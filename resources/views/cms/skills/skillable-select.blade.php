{{--
    Skill selection panel for any skillable model
--}}
<div class="grid grid-cols-3 gap-8">
    @foreach ($this->skillGroups as $skillGroup)
        <div class="">
            <h3 class="mb-4 text-center">{{ $skillGroup->name }}</h3>
            <ul class="grid grid-cols-2 gap-2">
                @foreach ($skillGroup->skills as $skill)
                    <li>
                        <button
                            @class([
                            'w-full text-sm',
                            'bg-zinc-700 hover:bg-zinc-600' => ! $this->skillable->skills->contains($skill),
                            'border border-zinc-700 hover:border-zinc-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-amber-400 text-zinc-800 font-semibold' => $this->skillable->skills->contains($skill),
                        ])
                        type="button" wire:click.prevent="toggleSkill({{ $skill->id }})">
                            {{ $skill->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>