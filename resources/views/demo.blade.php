<x-ui-layout>

    <div class="border-b pb-8 mb-16">
        <h1 class="text-6xl font-black">Demos</h1>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-x-16">

        <div>
            {{-- demo name --}}
            <h1 class="text-5xl mb-2 font-bold">
                <span class="material-icons-outlined text-4xl ml-1">smart_toy</span>
                {{ $demo->name }}
            </h1>

            {{-- Created --}}
            <p class="text-xs text-zinc-500">
                Created : {{ $demo->created_at->diffForHumans() }}
            </p>

            {{-- Demo description --}}
            <p class="pt-8">{{ $demo->description }}</p>

            {{-- Link to demo web site --}}
            @if ($demo->url)
                <p class="pt-8">
                    <a href="{{ $demo->url }}" target="_blank">
                        <span class="flex">
                            <span class="material-icons-outlined mr-1">open_in_browser</span>
                            Demo Website
                        </span>
                        <span class="text-xs">{{ $demo->url }}</span>
                    </a>
                </p>
            @endif
        </div>

        <div class="text-right">

            <x-related.links :model="$demo" />

        </div>

    </div>

</x-ui-layout>
