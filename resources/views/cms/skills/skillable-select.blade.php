{{--
    Skill selection panel for any skillable model
--}}
<ul class="grid grid-cols-3">
    @foreach ($this->skills as $skill)
        <li @class([
            'flex items-center gap-x-2',

        ])
        >
            <x-cms.form.checkbox id="skill-{{ $skill->id }}" value="{{ $skill->id }}" wire:key="skill-select-{{ $skill->id }}"
                :checked="$this->skillable->skills->contains($skill)"
            />
            {{ $skill->name }} <span class="text-xs">{{ $skill->skillGroups?->first()->name }}</span>
        </li>
    @endforeach
</ul>