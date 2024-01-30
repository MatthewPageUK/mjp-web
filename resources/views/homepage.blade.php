<x-ui-layout>

    <div class="space-y-16 lg:space-y-24">
        <div class="grid grid-cols-6 md:grid-cols-12 gap-4 md:gap-16">
            <div class="col-span-6 md:col-span-8">
                <h1 class="text-4xl lg:text-6xl mb-2 font-bold font-orbitron">
                    {{-- Site title --}}
                    {{ $name }}
                </h1>
                <h1 class="text-xl lg:text-4xl font-bold text-secondary-400 mb-8 font-orbitron">
                    {{-- Site tagline --}}
                    {{ $tagline }}
                </h1>
                <div class="prose prose-primary prose-lg max-w-full">
                    {{-- Introduction text --}}
                    @markdown($intro ?? '')
                </div>
                <div class="mt-4 XXtext-right">
                    <x-primary-button href="{{ route('availability') }}" title="Check my availability." class="text-sm gap-2">
                        <x-icons.material class="text-xl">event_available</x-icons.material>
                        Check my availability
                    </x-primary-button>
                    <x-primary-button href="#contact" title="Contact me to disucss your requirements in detail." class="text-sm gap-2">
                        <x-icons.material class="text-xl">forum</x-icons.material>
                        Get in touch
                    </x-primary-button>
                </div>
            </div>
            <div class="col-span-6 md:col-span-4">
                {{-- Bullet Points component --}}
                <x-ui.homepage.bullet-points :bullets="$bulletPoints" />
            </div>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                {{-- Livewire Journal widget --}}
                <livewire:ui.journal.widget />
            </div>
            <div>
                {{-- Livewire Skills widget --}}
                <livewire:ui.skill.widget />
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                {{-- Livewire Demos widget --}}
                <livewire:ui.demo.widget />
            </div>
            <div>
                {{-- Livewire Projects widget --}}
                <livewire:ui.project.widget />
            </div>
        </div>

        <div>
            {{-- Livewire Posts widget --}}
            <livewire:ui.post.widget />
        </div>

        {{-- Livewire Contact form --}}
        <div>
            <livewire:ui.contact />
        </div>

        {{-- Livewire Random Page button --}}
        <div class="my-32">
            <livewire:ui.random-page />
        </div>
    </div>
</x-ui-layout>
