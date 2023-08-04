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
                            'bg-zinc-700 hover:bg-zinc-600' => ! $this->skill->skillGroups->contains($group),
                            'border border-zinc-700 hover:border-zinc-600',
                            'rounded-lg px-2 py-1',
                            'transition duration-200 ease-in-out',
                            'focus:outline-none',
                            'bg-amber-400 text-zinc-800 font-semibold' => $this->skill->skillGroups->contains($group),
                        ])
                        type="button" wire:click.prevent="toggleGroup({{ $group->id }})">
                            {{ $group->name }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

</div>