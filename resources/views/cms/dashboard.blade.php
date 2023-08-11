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
            <div class="grid grid-cols-12 bg-primary-900 p-4 mt-1 rounded-lg text-left max-h-64 overflow-y-scroll gap-y-1 gap-x-2">
                @foreach ($this->results as $type => $results)
                    @foreach ($results as $result)
                        <div class="col-span-4 md:col-span-3"><span class="block border bg-highlight-400 text-primary-800 uppercase border-primary-700 px-2 py-1 rounded-lg text-xs text-primary-400 whitespace-nowrap">{{ $type }}</span></div>
                        <div class="col-span-8 md:col-span-9">
                            <a href="{{ route('cms.'.$type, ['mode' => 'update', 'id' => $result['id']]) }}" class="hover:text-secondary-400 transition-all">
                            {{ $result['name'] }}
                            </a>

                        </div>
                    @endforeach
                @endforeach
            </div>
        @endif
    </div>

</x-cms.layout.page>
