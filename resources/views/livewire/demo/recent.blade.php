<div>
    <div class="flex mb-8">
        <h1 class="flex-1 text-4xl font-bold text-amber-400">Demos</h1>

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

    <div class="md:grid md:grid-cols-2 gap-4 mt-4">
        @foreach ($this->demos as $key => $demo)
            <div class="border rounded-lg overflow-hidden border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600 pb-2">

                <a href="{{ route('demo', $demo) }}" class="block">
                    <img src="https://via.placeholder.com/640x360" class="" />
                    <span class="block text-lg px-4 pt-2">{{ $demo->name }}</span>
                    <span class="block text-xs px-4 text-slate-500">Created : {{ $demo->created_at->diffForHumans() }}</span>
                </a>
            </div>
        @endforeach

    </div>
    <div class="mt-2">
        <x-layout.pagination-dots :paginator="$this->demos" />
    </div>
</div>
