<div>
    {{-- Title --}}
    <h1 class="text-5xl mb-2">Demo Explorer</h1>

    {{-- Skills selector drop down --}}
    <div class="flex items-center my-8 py-4 border-t border-b">
        <h2 class="flex-1 text-right mr-2">Skill Selector</h2>
        <select wire:model="skill" class="rounded bg-zinc-800">
            <option value="">All</option>
            @foreach($skills as $skill)
                <option class="bg-zinc-800" value="{{ $skill->slug }}">{{ $skill->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Demos block --}}
    <div class="md:grid md:grid-cols-2 gap-8">
        @foreach ($this->demos as $key => $demo)

            {{-- Demo preview --}}
            <div class="border rounded-lg hover:bg-zinc-700">
                <p class="">
                    <a href="{{ route('demo', $demo) }}" class="block p-4">
                        <span class="block font-bold text-lg">{{ $demo->name }}</span>
                        <span class="block">{{ $demo->snippet }}</span>
                        <span class="block text-xs">Created : {{ $demo->created_at->diffForHumans() }}</span>

                        <span class="mt-4 block text-xs">More information</span>
                        <span class="block text-xs">Demo Website</span>
                </a>
                </p>
            </div>

        @endforeach

    </div>
</div>
