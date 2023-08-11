{{--
    UI - Projects - Homepage Widget

--}}
<div>
    <div class="flex mb-8">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-secondary-400">
            <a class="hover:text-highlight-400" href="{{ route('projects') }}">Projects</a>
        </h1>

        <div class="text-sm">
            Using
            <select wire:model="selectedSkill" class="bg-primary-800 ml-2 border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600">
                <option value="">Any skills</option>
                @foreach ($this->skills as $skill)
                    <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="md:grid md:grid-cols-2 gap-4 mt-4">
        @foreach ($this->projects as $key => $project)
            <div class="border rounded-lg overflow-hidden border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600 pb-2">

                <a href="{{ $project->url }}" class="block" title="View the '{{ $project->name }}' project">
                    <img src="https://loremflickr.com/640/360/computer?random=487643{{ $project->id }}" class="" />
                    <span class="block leading-tight text-lg p-4 pb-2">{{ $project->name }}</span>
                    <span class="text-xs px-4">{{ $project->skills->pluck('name')->implode(', ') }}</span>
                    <span class="block text-xs px-4 pb-2 text-primary-400 flex items-center gap-1">Last activity
                        <x-ui.badges.age :date="$project->updated_at" />
                    </span>
                </a>
            </div>
        @endforeach

    </div>
    <div class="mt-2">
        <x-layout.pagination-dots :paginator="$this->projects" />
    </div>
</div>
