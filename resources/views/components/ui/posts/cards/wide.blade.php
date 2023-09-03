{{--
    Shows post in wide horizontal card with image, title, snippet and date.
--}}
<div class="grid grid-cols-2 gap-4 overflow-hidden">
    <div class="col-span-1 space-y-2">

        <h2 class="text-3xl">
            <a href="{{ $post->routeUrl }}" class="text-secondary-400 hover:text-highlight-400">{{ $post->name }}</a>
        </h2>

        <p>
            {{ $post->snippet }}
        </p>

        <span class="text-xs">{{ $post->skills->pluck('name')->implode(', ') }}</span>

        <x-ui.badges.age :date="$post->created_at" />
    </div>

    <div>
        <img src="{{ $post->image }}" class="object-cover rounded-lg" />
    </div>

</div>