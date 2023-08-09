<x-ui-layout
    :showMasthead="false"
>

    <div class="grid grid-cols-6 lg:grid-cols-12 gap-4 lg:gap-16 lg:mt-16">
        <div class="col-span-6">
            <h1 class="text-4xl lg:text-6xl font-bold font-orbitron">Matthew Page</h1>
            <h1 class="text-xl lg:text-4xl font-bold text-amber-400 mb-8 font-orbitron">PHP / Larevel Backend Developer</h1>
            <p class="mb-4"> I am an experienced freelance PHP and Laravel backend web developer.</p>
            <p class="mb-4"> I have been developing web applications for over 20 years and have worked on a wide range of projects from small bespoke websites to large scale enterprise applications.</p>
            <p class="mb-4"> I am currently available for freelance work and would love to hear from you if you have a project that you would like to discuss.</p>
            <p>Working from the Norfolk, UK area - prefer local clients but can work with anyone, anywhere.</p>
        </div>
        <div class="col-span-6">
            {{-- Bullet Points --}}
            <x-homepage.bullet-points :bullets="$bulletPoints" />
        </div>
    </div>
    <div class="my-16 lg:grid lg:grid-cols-2 gap-x-16">

        <div class="grid grid-rows-2 gap-8">
            <div class="">
                <livewire:demo.homepage-widget />
            </div>
            <div class="self-end">
                <livewire:project.homepage-widget />
            </div>

        </div>

        <div class="XXmb-8 XXpb-8">
            <livewire:skill.homepage-widget />
        </div>

    </div>


    <livewire:ui.contact />



</x-ui-layout>
