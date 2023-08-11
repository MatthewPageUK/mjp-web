{{--
    Skill selection panel for any skillable model
--}}
<div class="grid grid-cols-1 gap-4 bg-primary-900 border border-primary-700 rounded-lg p-4">
    @foreach ($this->skillGroups as $skillGroup)
        <div class="">
            <h3 class="mb-2">{{ $skillGroup->name }}</h3>
            <ul class="grid grid-cols-3 gap-2">
                @foreach ($skillGroup->skills as $skill)
                    <li>
                        <button
                            @class([
                            'w-full text-sm',
                            'bg-primary-700 hover:bg-primary-600' => ! $this->skillable->skills->contains($skill),
                            'border border-primary-700 hover:border-primary-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-secondary-400 text-primary-800 font-semibold' => $this->skillable->skills->contains($skill),
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