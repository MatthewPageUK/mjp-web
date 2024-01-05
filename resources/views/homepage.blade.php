<x-ui-layout>

    <div class="grid grid-cols-6 lg:grid-cols-12 gap-4 lg:gap-16">
        <div class="col-span-6">
            <h1 class="text-4xl lg:text-6xl font-bold font-orbitron">
                {{-- Site title --}}
                {{ $name }}
            </h1>
            <h1 class="text-xl lg:text-4xl font-bold text-secondary-400 mb-8 font-orbitron">
                {{-- Site tagline --}}
                {{ $tagline }}
            </h1>
            <div class="prose prose-primary">
                {{-- Introduction text --}}
                @markdown($intro)
            </div>
        </div>
        <div class="col-span-6">
            {{-- Bullet Points component --}}
            <x-ui.homepage.bullet-points :bullets="$bulletPoints" />
        </div>
    </div>

    <div class="mt-16 mb-12 lg:grid lg:grid-cols-2 gap-16">

        <div class="grid grid-rows-2 gap-8">
            <div>
                {{-- Livewire Demos widget --}}
                <livewire:ui.demo.widget />
            </div>
            <div class="self-end">
                {{-- Livewire Projects widget --}}
                <livewire:ui.project.widget />
            </div>
        </div>

        <div>
            {{-- Livewire Skills widget --}}
            <livewire:ui.skill.widget />
        </div>

        <div class="col-span-2">
            {{-- Livewire Posts widget --}}
            <livewire:ui.post.widget />
        </div>

    </div>

    {{-- Livewire Contact form --}}
    <div class="my-32">
        <livewire:ui.contact />
    </div>

    {{-- Livewire Random Page button --}}
    <div class="my-32">
        <livewire:ui.random-page />
    </div>

</x-ui-layout>
