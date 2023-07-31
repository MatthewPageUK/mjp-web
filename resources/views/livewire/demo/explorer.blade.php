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
            <div class="border rounded-lg hover:bg-zinc-700 grid grid-cols-2">
                <p class="p-4">
                    <a href="{{ route('demo', $demo) }}" class="block mb-2">
                        <span class="block font-bold text-lg text-amber-400">{{ $demo->name }}</span>
                        <span class="block text-sm">{{ $demo->snippet }}</span>
                        <span class="block text-xs">Created : {{ $demo->created_at->diffForHumans() }}</span>
                    </a>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >View Demo</button>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >More info</button>

                </p>
                <div>
                    <img src="https://via.placeholder.com/840x500" class="" />
                </div>

            </div>

        @endforeach

    </div>
</div>
