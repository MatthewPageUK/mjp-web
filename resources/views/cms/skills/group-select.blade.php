{{--
    Skill Group selection panel for Skills
--}}
<div class="">
        <div class="">
            <ul class="grid grid-cols-2 gap-2">
                @foreach ($groups as $group)
                    <li>
                        <button
                            @class([
                            'w-full text-sm',
                            'bg-primary-700 hover:bg-primary-600' => ! $this->skill->skillGroups->contains($group),
                            'border border-primary-700 hover:border-primary-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-secondary-400 text-primary-800 font-semibold' => $this->skill->skillGroups->contains($group),
                        ])
                        type="button" wire:click.prevent="toggleGroup({{ $group->id }})">
                            {{ $group->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

</div>