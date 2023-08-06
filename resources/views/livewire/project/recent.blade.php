<div>
    <div class="flex mb-8">
        <h1 class="flex-1 text-4xl font-bold text-amber-400">Projects</h1>

        <div class="text-sm">
            Using
            <select wire:model="group" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any skills</option>
                {{-- @foreach ($this->groups as $skillGroup)
                    <option value="{{ $skillGroup->id }}">{{ $skillGroup->name }}</option>
                @endforeach --}}
                <option value="1">PHP</option>
            </select>
        </div>
    </div>

    <div class="md:grid md:grid-cols-1">
        @foreach ($this->projects->take(4) as $key => $project)
            <div class="" x-data="{ open: false }" @mouseover.away = "open = false">
                <p class="" @mouseover="open = true">
                    <a href="{{ route('project', $project) }}" class="block p-4 my-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                        <span class="block text-lg">{{ $project->name }}</span>
                        <span class="block text-xs">Last update : {{ $project->updated_at->diffForHumans() }} xx</span>

                    </a>
                    {{-- <div x-show="open" class="pr-4">
                        intro intro intro intro intro intro intro intro intro intro intro intro intro intro intro intro intro intro
                    </div> --}}
                </p>

            </div>
        @endforeach

    </div>
    <div class="mt-2">
        <x-layout.pagination-dots />
    </div>
</div>

