@use('App\Enums\CvSectionType')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    style="font-size: 80%"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=rubik:100,200,300,400,500,600,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=gochi-hand:400" rel="stylesheet" />

        <!-- Icons -->
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            .material-symbols-outlined {
              font-variation-settings:
              'FILL' 0,
              'wght' 400,
              'GRAD' 0,
              'opsz' 24
            }
            </style>

    </head>
    <body
        style="font-family: 'Rubik', sans-serif;"
        class="font-sans antialiased"
    >
        {{-- Header --}}
        <div class="bg-zinc-700 p-4 grid grid-cols-12">
            {{-- Logo --}}
            <div class="col-span-3 align-center mx-8">
                <img src="https://mjp.co/logo-chrome.png" class="">
            </div>
            {{-- Name --}}
            <div class="col-span-8 px-16">
                <h1 class="text-4xl text-white">{{ $data['name'] }}</h1>
                <h2 class="text-2xl text-white">{{ $data['tagline'] }}</h2>
            </div>
            {{-- Dev label --}}
            <div class="justify-end text-right">
                <p class="-rotate-90 text-xs text-center text-white mt-3 leading-tight tracking-tight uppercase">Senior Developer
                    <span class="material-symbols-outlined text-sm text-amber-400">star_rate</span>
                    <span class="material-symbols-outlined text-sm text-amber-400">star_rate</span>
                    <span class="material-symbols-outlined text-sm text-amber-400">star_rate</span>
                    <span class="material-symbols-outlined text-sm text-amber-400">star_rate</span>
                    <span class="material-symbols-outlined text-sm text-amber-400">star_rate</span>
                </p>
            </div>
        </div>

        {{-- Main page --}}
        <div class="grid grid-cols-12">
            {{-- Side bar --}}
            <div class="col-span-3 bg-zinc-300 shadow-lg rounded-br-lg">
                {{-- Traingle --}}
                <div class="triangle-container">
                    <svg viewBox="0 0 500 100" class="w-full fill-zinc-700">
                        <polygon points="0,0 500,0 250,100" class="triangle" />
                    </svg>
                </div>
                <div class="py-4 px-6">
                    {{-- Contact details --}}
                    <h2 class="text-2xl mb-2 tracking-tight">Contact Details</h2>
                    <ul class="space-y-3 text-zinc-700">
                        <li class="flex items-center gap-2">
                            <x-icons.material class="text-lg text-amber-600">mail</x-icons.material>
                            <a href="mailto:work@mjp.co" title="Email me">work@mjp.co</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <x-icons.material class="text-lg text-amber-600">call</x-icons.material>
                            <a href="tel:{{ str($data['phone'])->replace(' ', '') }}" title="Call me">{{ $data['phone'] }}</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <x-icons.material class="text-lg text-amber-600">globe_uk</x-icons.material>
                            www.mjp.co
                        </li>
                        <li class="flex items-center gap-2">
                            <x-icons.github class="shrink-0 w-4 h-4 fill-amber-600" />
                            <a href="https://{{ $data['github'] }}" class="text-sm leading-tight">www.github.com/ MatthewPageUK</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <x-icons.linkedin-outline class="shrink-0 w-4 h-4 fill-amber-600" />
                            <a href="https://{{ $data['linkedin'] }}" class="text-sm leading-tight">www.linkedin.com/in/ matthew-page-uk</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <x-icons.material class="text-lg text-amber-600">home</x-icons.material>
                            <span class="text-sm">{{ $data['address'] }}</span>
                        </li>
                    </ul>
                    {{-- Top skills --}}
                    <h2 class="text-2xl mt-8 tracking-tight">Top Skills</h2>
                    <ul class="flex flex-wrap mt-2">
                        @foreach($data['topskills'] as $skill)
                            <li class="rounded bg-zinc-700 text-sm text-white text-center px-2 py-1 m-0.5">
                                <a href="{{ $skill->routeUrl }}" class="">
                                    {{ $skill->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{-- Recent skills --}}
                    {{-- <h2 class="text-2xl mt-8 tracking-tight">Recent Skills</h2> --}}
                    <ul class="flex flex-wrap border-t pt-2 mt-2">
                        @foreach($data['skills'] as $skill)
                            <li class="rounded bg-zinc-700 text-sm text-white text-center px-2 py-1 m-0.5">
                                <a href="{{ $skill->routeUrl }}" class="">
                                    {{ $skill->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    {{-- Demos / projects --}}
                    <h2 class="text-2xl mt-8 tracking-tight mb-1">Projects & Demos</h2>
                    @foreach($data['demos'] as $demo)
                        <div class="mb-2">
                            <a href="{{ $demo->routeUrl }}" class="block">
                                <img src="{{ $demo->image?->url }}" class="w-full mb-1" alt="{{ $demo->name }}">
                                <h3 class="text-sm text-zinc-700 leading-tight">{{ $demo->name }}</h3>
                            </a>
                        </div>
                    @endforeach

                    {{-- Refenerences --}}
                    <h2 class="text-2xl mt-8 tracking-tight mb-1">References</h2>
                    <div class="border border-zinc-200 rounded-md p-4 max-w-sm w-full mx-auto">
                        <div class="animate-pulse flex space-x-4">
                          <div class="rounded-full bg-slate-200 h-10 w-10"></div>
                          <div class="flex-1 space-y-6 py-1">
                            <div class="h-2 bg-slate-200 rounded"></div>
                            <div class="space-y-3">
                              <div class="grid grid-cols-3 gap-4">
                                <div class="h-2 bg-slate-200 rounded col-span-2"></div>
                                <div class="h-2 bg-slate-200 rounded col-span-1"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <p class="mt-1 text-zinc-600 leading-tight text-xs">Please contact me for reference data release.</p>

                </div>
            </div>
            <div class="col-span-9 py-4 px-16">

                {{-- Main CV --}}

                @foreach ($data['sections'] as $section)

                    {{-- Section header --}}
                    <h2 class="text-4xl tracking-tight border-b pb-2 mt-8 text-amber-600 font-light">{{ $section->heading }}</h2>

                    {{-- Section sub heading --}}
                    @if ($section->sub_heading && $section->type === CvSectionType::Text)
                        <h2 class="mt-2">{{ $section->sub_heading }}</h2>
                    @endif

                    {{-- Text Content --}}
                    @if ($section->type === CvSectionType::Text)
                        <p class="mt-2 font-light">
                            {{ $section->content }}
                        </p>
                    @else


                        {{-- Work experience --}}
                        @foreach ($data['work'] as $work)

                            <div class="mt-4 mb-2">
                                <h3 class="text-xl mb-1">{{ $work->name }}</h3>
                                <p class="text-sm text-zinc-400 mb-1">{{ $work->start?->format('F Y') }} - {{ $work->end?->format('F Y') }}</p>
                                <ul class=" flex-1">
                                    @foreach($work->key_points as $key => $point)

                                        <li class="relative py-1">
                                            <div class="flex items-center mb-1">
                                                {{-- Line --}}
                                                @if ($key < count($work->key_points) - 1)
                                                    <div class="absolute left-0 h-full w-0.5 bg-zinc-400 self-start ml-2.5 -translate-x-1/2 translate-y-3" aria-hidden="true"></div>
                                                @endif

                                                {{-- Bullet --}}
                                                <div class="absolute left-0 rounded-full bg-amber-500" aria-hidden="true">
                                                    <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 20 20">
                                                        <path d="M14.4 8.4L13 7l-4 4-2-2-1.4 1.4L9 13.8z"></path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-base font-light text-zinc-700 dark:text-zinc-100 pl-9">{{ $point['title'] }}</h3>
                                            </div>
                                            {{-- <div class="text-sm pl-9">{{ $point['text'] }}</div> --}}
                                        </li>

                                    @endforeach

                                </ul>
                            </div>

                        @endforeach


                    @endif


                @endforeach

            </div>
        </div>
    </body>
</html>
