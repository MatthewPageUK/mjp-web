<x-ui-layout>

    <div class="border-b pb-8 mb-4">
        <h1 class="text-6xl font-black flex items-center">
            <span class="flex-1">{{ $demo->name }}</span>
            <span class="material-icons-outlined text-6xl ml-1">smart_toy</span>
        </h1>
    </div>

            {{-- Embedded demo --}}
            @if ($demo->demo_url)
                <iframe src="{{ $demo->demo_url }}" class="w-full h-[700px] mt-8 border border-2 border-zinc-900 shadow-lg"></iframe>
            @endif

    <div class="lg:grid lg:grid-cols-3 gap-x-16 my-16">

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

            {{-- Demo description --}}
            <div class="prose prose-xl prose-zinc">
                @markdown($demo->description)
            </div>

            {{-- Created --}}
            <p class="mt-8 text-xs">
                Created : {{ $demo->created_at->diffForHumans() }}
            </p>

        </div>

        <div class="xxxtext-right">

            <x-related.links :model="$demo" />

        </div>

    </div>

</x-ui-layout>
