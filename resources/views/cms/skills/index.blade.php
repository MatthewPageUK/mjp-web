<div x-data="{ mode: @entangle('mode') }" class="my-8">

    {{-- Header --}}
    <h1 class="text-4xl flex"
        x-show="mode !== 'create' && mode !== 'edit'"
    >
        <span class="flex-1">Skills</span>

        {{-- Add button --}}
        <x-cms.icon-button
            wire:click.prevent="add"
            x-show="mode !== 'create'"
            title="Add Skill"
            icon="add_circle" />
    </h1>

    {{-- Session Messages --}}
    <x-cms.session-messages />

    {{-- Create / Edit form --}}
    <x-cms.form.form
        x-show="mode === 'create' || mode === 'edit'"
        title="{{ ucwords($this->mode) }} Skill"
    >
        <div class="grid grid-cols-12 gap-x-8 gap-y-1 md:gap-y-4">

            {{-- Name --}}
            <label class="col-span-12 md:col-span-3 block mb-2">Name</label>
            <div class="col-span-12 md:col-span-9 flex gap-4 items-center">
                <div class="flex-1">
                    <x-cms.form.input wire:model="skill.name" class="text-2xl font-black" />
                    {{-- <span class="text-sm text-zinc-400 pl-2">{{ $this->skill->slug }}</span> --}}
                    <x-cms.validation-error field="skill.name" />
                </div>
                <div>


                    {{-- Active --}}
                    {{-- <label class="col-span-3 block mb-2">Active</label> --}}
                    <div>
                        <x-cms.validation-error field="skill.active" />

                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="skill.active" class="sr-only peer">
                            <div class="w-11 h-6 bg-zinc-600 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-amber-400 dark:peer-focus:ring-amber-400
                                rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full
                                peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white
                                after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                            {{-- <span class="ml-3 text-sm font-medium text-zinc-300 ">Toggle me</span> --}}
                        </label>

                    </div>



                </div>
            </div>

            {{-- Slug --}}
            {{-- <label class="col-span-3 block mb-2">Slug</label>
            <div class="col-span-9">
                <x-cms.form.input wire:model="skill.slug" disabled />
                <x-cms.validation-error field="skill.slug" />
            </div> --}}

            {{-- Description --}}
            <label class="col-span-12 md:col-span-3 block mb-2">Description</label>
            <div class="col-span-12 md:col-span-9">
                <x-cms.form.textarea wire:model="skill.description" class="h-64" />
                <x-cms.validation-error field="skill.description" />
            </div>

            {{-- Level --}}
            <label class="col-span-12 md:col-span-3 block mb-2">Skill Level</label>
            <div class="col-span-12 md:col-span-9">
                {{-- <x-cms.form.select wire:model="skill.level" class="font-black">
                    @for ($x = 1; $x <= 10; $x++)
                        <option value="{{ $x }}">{{ $x }}</option>
                    @endfor
                </x-cms.form.select> --}}
                <x-cms.validation-error field="skill.level" />
                <input class="accent-amber-400 w-1/2 h-3 bg-zinc-900 rounded-lg cursor-pointer range-lg" type="range" min="1" max="10" step="1" wire:model="skill.level">
                <span class="ml-2 text-2xl font-black">{{ $this->skill->level }}</span>
            </div>

            {{-- SVG --}}
            <label class="col-span-12 md:col-span-3 block mb-2">SVG</label>
            <div class="col-span-12 md:col-span-9">
                <div class="flex gap-4">
                    <x-cms.form.textarea wire:model="skill.svg" class="h-16 text-sm focus:h-64" />
                    <div class="w-32 h-32">{!! $this->skill->svg !!}</div>
                </div>
                <x-cms.validation-error field="skill.svg" />
            </div>

            {{-- Active --}}
            {{-- <label class="col-span-3 block mb-2">Active</label>
            <div class="col-span-9">
                <x-cms.validation-error field="skill.active" />

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" wire:model="skill.active" class="sr-only peer">
                    <div class="w-11 h-6 bg-zinc-600 peer-focus:outline-none peer-focus:ring-1 peer-focus:ring-amber-400 dark:peer-focus:ring-amber-400
                        rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full
                        peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white
                        after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-amber-400"></div>
                  </label>

            </div> --}}

            {{-- Create buttons --}}
            @if ($this->mode === 'create')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="create" label="Create" />
                    <x-cms.text-button wire:click.prevent="cancelAdd" label="Cancel" />
                </div>
            @endif

            {{-- Edit buttons --}}
            @if ($this->mode === 'edit')
                <div class="col-span-12 text-right self-end mb-8">
                    <x-cms.text-button wire:click.prevent="save" label="Save" />
                    <x-cms.text-button wire:click.prevent="cancelEdit" label="Cancel" />
                </div>
            @endif


            @if ($this->mode === 'edit')

                {{-- Skill Groups --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Groups</label>
                <div class="col-span-12 md:col-span-9 border border-zinc-700 rounded-lg p-4">
                    <livewire:cms.skill-groupable :skill="$this->skill" wire:key="skillgroupable-{{ $this->skill->id }}" />
                </div>

                {{-- Posts --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Posts</label>
                <div class="col-span-12 md:col-span-9">
                    <livewire:cms.postable :postable="$this->skill" wire:key="skillabls-{{ $this->skill->id }}" />
                </div>

                {{-- Demos --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Demos</label>
                <div class="col-span-12 md:col-span-9">
                    <livewire:cms.demoable :demoable="$this->skill" wire:key="demoable-{{ $this->skill->id }}" />
                </div>

                {{-- Projects --}}
                <label class="col-span-12 md:col-span-3 block mb-2">Projects</label>
                <div class="col-span-12 md:col-span-9">
                    <livewire:cms.projectable :projectable="$this->skill" wire:key="projectable-{{ $this->skill->id }}" />
                </div>

                {{-- Experiences --}}

            @endif

        </div>
    </x-cms.form.form>

    {{-- Delete confirmation --}}
    <x-cms.form.form
        x-show="mode === 'delete'"
        title="Delete Skill '{{ $this->skill->name }}'"
    >
        <div class="grid grid-cols-2 items-center">
            <p>Are you sure you want to delete the Skill?</p>
            <div class="text-right">
                <x-cms.text-button wire:click.prevent="delete" label="Delete" />
                <x-cms.text-button wire:click.prevent="cancelDelete" label="Cancel" />
            </div>
        </div>
    </x-cms.form.form>

    {{-- Skill list --}}
    <ul class="mt-16">

        @foreach ($this->groups as $skillGroup)

            <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-zinc-400 hover:text-white" wire:key="skillgroup-{{ $skillGroup->id }}">

                {{-- Name --}}
                <div class="flex-1">
                    <span class="block text-2xl text-white">{{ $skillGroup->name }}</span>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-1 ml-4">
                    <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $skillGroup->id }})" title="Edit the {{ $skillGroup->name }} skill" />
                    <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $skillGroup->id }})" title="Delete the {{ $skillGroup->name }} skill" />
                </div>

            </li>

        @forelse ($skillGroup->skills as $skill)
            <li class="group flex gap-4 pt-3 border-b pb-3 items-center text-zinc-400 hover:text-white" wire:key="skill-{{ $skill->id }}">

                {{-- Level --}}
                <span @class([
                        'flex items-center justify-center text-white font-bold font-orbitron w-8 h-8 rounded-full group-hover:w-16 group-hover:h-6 group-hover:shadow-lg group-hover:rounded-sm transition-all',
                        'bg-zinc-400' => ! $skill->active,
                        'bg-red-400' => $skill->active && $skill->level < 3,
                        'bg-amber-400' => $skill->active && $skill->level < 7 && $skill->level >= 3,
                        'bg-green-400' => $skill->active && $skill->level >= 7,
                    ])
                >
                    {{ $skill->level }}
                </span>

                {{-- Name --}}
                <div class="flex-1">
                    <span class="block md:text-2xl text-white">{{ $skill->name }}</span>
                </div>

                {{-- Group(s) --}}
                <div class="hidden md:block">
                    <span class="text-sm">{{ $skill->skillGroups->implode('name', ', ') }}</span>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-1 ml-4">
                    <x-cms.icon-button icon="edit" wire:click.prevent="edit({{ $skill->id }})" title="Edit the {{ $skill->name }} skill" />
                    <x-cms.icon-button icon="delete" wire:click.prevent="confirmDelete({{ $skill->id }})" title="Delete the {{ $skill->name }} skill" />
                </div>

            </li>
        @empty
            {{-- No skills - open the add form on render --}}
            <li class="text-2xl" Xwire:init="add">No skills found.</li>
        @endforelse

        @endforeach
    </ul>
</div>
