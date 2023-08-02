<x-ui-layout>

    <div class="border-b pb-8 mb-16">
        <h1 class="text-6xl font-black flex items-center">
            <span class="flex-1">{{ $demo->name }}</span>
            <span class="material-icons-outlined text-6xl ml-1">smart_toy</span>
        </h1>
    </div>

    <div class="lg:grid lg:grid-cols-3 gap-x-16">

        <div class="col-span-2">




            {{-- Link to demo web site --}}
            @if ($demo->url)
                <p class="pb-8">
                    <a href="{{ $demo->url }}" target="_blank">
                        <span class="flex text-amber-400">
                            <span class="material-icons-outlined mr-1">open_in_browser</span>
                            Demo Website
                        </span>
                        <span class="text-xs">{{ $demo->url }}</span>
                    </a>
                </p>
            @endif

            {{-- Created --}}
            <p class="text-xs text-zinc-500">
                Created : {{ $demo->created_at->diffForHumans() }}
            </p>

            {{-- Embedded demo --}}
            @if ($demo->demo_url)
                <iframe src="{{ $demo->demo_url }}" class="w-full h-[600px] mt-8 border border-2 border-zinc-900 shadow-lg"></iframe>
            @endif

            {{-- Demo description --}}
            <p class="pt-8">{{ $demo->description }}</p>

            <img src="https://via.placeholder.com/840x500" class="mt-8" />

        </div>

        <div class="xxxtext-right">

            <x-related.links :model="$demo" />

        </div>

    </div>

</x-ui-layout>
