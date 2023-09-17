{{-- UI - Demo - View demo --}}

@props(['demo'])

<div class="border-b pb-4 md:pb-8 mb-4">
    <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center">
        <span class="flex-1">{{ $demo->name }}</span>
        <span class="hidden md:block material-icons-outlined text-6xl ml-1">smart_toy</span>
    </h1>
</div>

{{-- Embedded demo iframe --}}
@if ($demo->demo_url)
    <iframe
        src="{{ $demo->demo_url }}"
        class="w-full h-[700px] mt-8"
    ></iframe>
@else
    {{-- or Image --}}
    <div class="w-full mt-8 border border-2 border-primary-900 shadow-lg" >
        <x-ui.imageable :model="$demo" />
    </div>
@endif

<div class="lg:grid lg:grid-cols-3 gap-x-16 my-16">

    <div class="col-span-2 space-y-8">

        {{-- Link to demo web site --}}
        @if ($demo->url)
            <x-ui.external-link href="{{ $demo->url }}" title="Demo Website" />
        @endif

        {{-- Demo description --}}
        <div class="prose prose-xl prose-primary">
            @markdown($demo->description)
        </div>

        {{-- Created --}}
        <p class="text-xs flex items-center gap-1">
            Created : <x-ui.badges.age :date="$demo->created_at" />
        </p>

    </div>

    <div class="">

        <x-related.links :model="$demo" />

        <div>
            @if ($demo->hasGithubRepo())
                <div>
                    {{-- Github info panel --}}
                    <livewire:github.info :model="$demo" />
                </div>
            @endif
        </div>
    </div>

</div>
