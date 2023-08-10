{{--
    UI - Demos - Homepage Widget

--}}
<div>
    <div class="flex mb-8">
        <h1 class="flex-1 text-4xl font-black font-orbitron text-amber-400">
            <a class="hover:text-purple-400" href="{{ route('demos') }}">Demos</a>
        </h1>

        <div class="text-sm">
            Using
            <select wire:model="selectedSkill" class="bg-zinc-800 ml-2 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600">
                <option value="">Any skills</option>
                @foreach ($this->skills as $skill)
                    <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="md:grid md:grid-cols-2 gap-4 mt-4">
        @foreach ($this->demos as $key => $demo)
            <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                <a href="{{ $demo->url }}" class="block" title="View the '{{ $demo->name }}' demo">
                    <img src="https://loremflickr.com/640/360/computer?random=487643{{ $demo->id }}" class="" />
                    <span class="block leading-tight text-lg p-4 pb-2">{{ $demo->name }}</span>
                    <span class="text-xs px-4">{{ $demo->skills()->pluck('name')->implode(', ') }}</span>
                    <span class="block text-xs px-4 pb-2 text-slate-500">Created : {{ $demo->created_at->diffForHumans() }}</span>
                </a>
            </div>
        @endforeach

    </div>
    <div class="mt-2">
        <x-layout.pagination-dots :paginator="$this->demos" />
    </div>
</div>
