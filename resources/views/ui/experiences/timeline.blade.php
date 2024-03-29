<div>
    <div class="md:flex items-end my-4 md:my-8 py-4 gap-16">
        <div class="flex-1">
            <h1 class="text-6xl mb-8 flex items-center gap-2">
                <x-icons.material class="text-6xl">public</x-icons.material>Work Experience
            </h1>
            @if ($this->intro)
                <p class="text-xl w-1/2">{{ $this->intro }}</p>
            @endif
        </div>
    </div>

    @foreach ($this->experiences as $experience)

        <article class="pt-6 px-6
            odd:bg-gradient-to-l even:bg-gradient-to-r from-primary-100 from-20% to-50%
            dark:odd:bg-gradient-to-l dark:even:bg-gradient-to-r dark:from-primary-900 dark:from-20% dark:to-50%  mb-8">
            <div class="xl:flex">
                <div class="w-32 shrink-0">
                    <h2 class="text-xl leading-snug font-bold text-primary-500 dark:text-primary-100 xl:leading-7 mb-4 xl:mb-0">{{ $experience->start->format('Y') }}</h2>
                </div>
                <div class="relative grow pb-6">
                    <header class="text-2xl mb-4 leading-none">
                        <a href="{{ $experience->routeUrl }}" class="text-secondary-500 font-black">
                            {{ $experience->name }}
                        </a>
                    </header>
                    <!-- List -->
                    <div class="flex items-end">
                        <x-ui.experience.key-points :key_points="$experience->key_points" />


                        <x-primary-button class="" href="{{ $experience->routeUrl }}">
                            Read More
                            <x-icons.material>play_arrow</x-icons.material>
                        </x-primary-button>

                    </div>
                    <div class="absolute top-0 right-0 w-1/4">
                        <div>
                            <ul class="list-none text-right flex flex-wrap gap-1">
                                @foreach ($experience->skills as $skill)
                                    <li class="uppercase text-xs px-2 py-1">{{ $skill->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </article>

    @endforeach
</div>