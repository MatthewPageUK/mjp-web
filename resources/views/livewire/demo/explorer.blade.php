<div>
    {{-- Title --}}


    {{-- Skills selector drop down --}}
    <div class="md:flex items-end my-4 md:my-8 py-4 gap-16">
        <div class="flex-1">
            <h1 class="font-orbitron font-black text-5xl mb-8 flex items-center gap-2">
                <x-icons.material class="text-4xl">smart_toy</x-icons-material>
                Demos
            </h1>
            <p class="text-xl">{{ $this->intro }}</p>
        </div>

        <div>
            <h2 class="md:text-right md:mr-2 mt-4 md:mt-0">Skill Selector</h2>
            <select wire:model="skill" class="rounded bg-primary-800">
                <option value="">All</option>
                @foreach($skills as $skill)
                    <option class="bg-primary-800" value="{{ $skill->slug }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Demos block --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16">
        @foreach ($this->demos as $key => $demo)

            {{-- Demo preview --}}
            <div class="border border-primary-700 rounded-lg bg-primary-700 hover:bg-primary-800 grid grid-cols-1 lg:grid-cols-2 overflow-hidden">
                <p class="p-4">
                    <a href="{{ $demo->url }}" class="block mb-2">
                        <span class="block font-bold text-lg text-secondary-400">{{ $demo->name }}</span>
                        <span class="block text-sm">{{ $demo->snippet }}</span>
                        <span class="block text-xs mt-2 text-primary-400 flex items-center gap-1">Created : <x-ui.badges.age :date="$demo->created_at" /></span>
                    </a>
                </p>
                <div class="order-first lg:order-last">
                    <a href="{{ $demo->url }}">
                        <img src="https://loremflickr.com/640/400/computer,game?random=3487143{{ $demo->id }}" class="" />
                    </a>
                </div>

            </div>

        @endforeach

    </div>
</div>
