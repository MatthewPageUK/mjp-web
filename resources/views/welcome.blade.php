<x-guest-layout :masthead="true">

    <div class="w-1/3">
        <h1 class="text-4xl font-bold">Matthew Page - PHP / Larevel Backend Developer</h1>
        <p> My name is Matthew Page and I am an experienced PHP and Laravel backend web developer.</p>
        <p> I have been developing web applications for over 20 years and have worked on a wide range of projects from small bespoke websites to large scale enterprise applications.</p>
        <p> I am currently available for freelance work and would love to hear from you if you have a project that you would like to discuss.</p>
    </div>
    <div class="mt-16 lg:grid lg:grid-cols-2 gap-x-32">

        <div>
            <livewire:project.recent />
        </div>

        <div>
            <livewire:skill.top10 />
        </div>

        <div>
            <livewire:demo.recent />
        </div>

    </div>

</x-guest-layout>
