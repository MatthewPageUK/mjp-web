@props(['key_points' => []])

<ul class="-my-2 flex-1">
    @foreach($key_points as $key => $point)

        <li class="relative py-2">
            <div class="flex items-center mb-1">
                {{-- Line --}}
                @if ($key < count($key_points) - 1)
                    <div class="absolute left-0 h-full w-0.5 bg-primary-400 self-start ml-2.5 -translate-x-1/2 translate-y-3" aria-hidden="true"></div>
                @endif

                {{-- Bullet --}}
                <div class="absolute left-0 rounded-full bg-secondary-500" aria-hidden="true">
                    <svg class="w-5 h-5 fill-current text-white" viewBox="0 0 20 20">
                        <path d="M14.4 8.4L13 7l-4 4-2-2-1.4 1.4L9 13.8z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-primary-100 pl-9">{{ $point['title'] }}</h3>
            </div>
            <div class="pl-9">{{ $point['text'] }}</div>
        </li>

    @endforeach

</ul>