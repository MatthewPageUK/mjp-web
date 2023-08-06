<x-cms.layout.page class="min-h-screen flex items-center justify-center">

    <div class="text-center">

        <h1 class="text-4xl md:text-7xl font-black mb-8">Welcome...</h1>

        <h1 class="text-3xl md:text-5xl font-black mb-4 hover:text-6xl transition-all">“Strive not to be a success, <br class="hidden lg:block">but rather to be of value.”</h1>
        <p>Albert Einstein</p>

        <div>
            <h3 class="text-3xl mt-8 mb-2">Start here...</h3>
            <x-cms.form.input wire:model="search" placeholder="search..."/>
        </div>

        @if (! empty($this->search))
            <div class="grid grid-cols-12 bg-zinc-900 p-4 mt-1 rounded-lg text-left max-h-64 overflow-y-scroll gap-y-1">
                @foreach ($this->results as $type => $results)
                    @foreach ($results as $result)
                        <div class="col-span-4 md:col-span-2"><span class="block border border-zinc-400 p-1 rounded-lg mr-2 text-xs text-zinc-400 whitespace-nowrap">{{ $type }}</span></div>
                        <div class="col-span-8 md:col-span-10">
                            <a href="{{ route('cms.'.$type, ['mode' => 'update', 'id' => $result['id']]) }}" class="hover:text-amber-400 transition-all">
                            {{ $result['name'] }}
                            </a>

                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif
    </div>

</x-cms.layout.page>
