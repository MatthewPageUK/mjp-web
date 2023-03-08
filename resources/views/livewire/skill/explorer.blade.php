<div>
    {{-- Title --}}
    <h1 class="text-5xl mb-2">Skill Explorer</h1>

    {{-- Skill Groups selector drop down --}}
    <div class="flex items-center my-8 py-4 border-t border-b">
        <h2 class="flex-1 text-right mr-2">Skill Group</h2>
        <select wire:model="group" class="rounded bg-zinc-800">
            <option value="">All</option>
            @foreach($groups as $group)
                <option class="bg-zinc-800" value="{{ $group->slug }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Skills block --}}
    <div class="md:grid md:grid-cols-2 gap-8">

        <div>
        @foreach ($this->skills as $key => $skillPreview)

            {{-- Skill preview --}}
            <div class="border rounded-lg hover:bg-zinc-700 mb-1" wire:key="skill-preview-{{ $skillPreview->slug }}">
                <p class="">
                    <a href="{{ route('skill', $skillPreview) }}" wire:click.prevent="setSkill('{{ $skillPreview->slug }}')" class="block p-4">
                        <span class="block font-bold text-lg">{{ $skillPreview->name }}</span>
                        <x-skills.stars :skill="$skillPreview" />
                </a>
                </p>
            </div>

        @endforeach
        </div>

        <div class="border rounded-lg p-8">

            @if ($this->skill)
                <div wire:key="skill-view-{{ $this->skill?->slug }}">
                    <livewire:skill.view-skill :skill="$this->skill" wire:key="skill-view-{{ $this->skill?->slug }}-component" />
                </div>
            @else

                <h1 class="text-5xl mb-2 font-bold text-center">Choose a Skill</h1>

            @endif

        </div>

    </div>
</div>
