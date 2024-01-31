{{-- UI - Demo - View demo --}}

@props(['demo'])
@use('App\Enums\Section')
<div class="mb-4">
    <h1 class="text-2xl md:text-5xl tracking-tight font-black flex items-center gap-2">
        <span class="flex-1">{{ $demo->name }}</span>
        <x-icons.material :name="$demo->icon" class="hidden md:block text-6xl">smart_toy</x-icons.material>
    </h1>
</div>

{{-- Embedded demo iframe --}}
@if ($demo->demo_url)
    <livewire:ui.i-frame :src="$demo->demo_url" class="w-full h-[700px] mt-8" />
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
        <div class="prose prose-lg prose-primary max-w-full">
            @markdown($demo->description ?? '')
        </div>

        {{-- Page updated --}}
        <p class="text-xs flex items-center gap-1">
            Page updated : <x-ui.badges.age :date="$demo->updated_at" />
        </p>



    </div>

    <div class="space-y-8">

        {{-- <x-related.links :model="$demo" /> --}}
        {{-- Skills used --}}
        <div>
            <h2 class="text-4xl mb-4 flex items-center gap-2">
                <x-icons.material class="text-3xl">{{ Section::Skills->getUiIcon() }}</x-icons.material>
                Skills used
            </h2>
            <div class="flex flex-wrap gap-2">
                @foreach ($demo->skills as $skill)
                    <x-primary-button href="{{ $skill->routeUrl }}" title="" class="text-sm">
                        {{ $skill->name }}
                    </x-primary-button>
                @endforeach
            </div>
        </div>

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
