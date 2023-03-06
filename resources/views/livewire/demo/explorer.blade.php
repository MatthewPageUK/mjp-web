<div>
    <h1 class="text-5xl text-center mb-2">Demo Explorer</h1>

    <div class="md:grid md:grid-cols-2">
        @foreach ($this->demos as $key => $demo)
            <div class="">
                <p class=" text-center">
                    <a href="{{ route('demo', $demo) }}" class="block p-4 m-2 border rounded-lg bg-zinc-800 hover:bg-zinc-700">
                        <span class="block text-lg">{{ $demo->name }}</span>
                        <span class="text-xs">Created : {{ $demo->created_at->diffForHumans() }}</span>
                    </a>
                </p>
            </div>
        @endforeach

        <div>
            Demo Explorer
        </div>

        <div>
            <h2>Skills</h2>
            <select wire:model="skill" class="bg-zinc-800">
                <option value="">All</option>
                @foreach($skills as $skill)
                    <option class="bg-zinc-400" value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
</div>
