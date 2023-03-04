<div>
    <h1 class="text-5xl text-center mb-2">Recent Projects</h1>

    <div class="md:grid md:grid-cols-2">
        @foreach ($this->projects as $key => $project)
            <div class="">
                <p class=" text-center">
                    <a href="{{ route('project', $project) }}" class="block p-4 m-2 border rounded-lg bg-zinc-800 hover:bg-zinc-700">
                        <span class="block text-lg">{{ $project->name }}</span>
                        <span class="text-xs">Last update : {{ $project->last_active->diffForHumans() }}</span>
                    </a>
                </p>
            </div>
        @endforeach

        <div>
            Projects Explorer
        </div>

    </div>
</div>
