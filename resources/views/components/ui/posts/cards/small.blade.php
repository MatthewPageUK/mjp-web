{{--
    Shows post in small vertical card with image, title and date.
--}}
<x-ui.card>
    <a href="{{ $post->routeUrl }}" class="block" title="Read '{{ $post->name }}'">

        <x-ui.imageable :model="$post" />

        <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>

        <x-ui.badges.age :date="$post->created_at" class="px-4" />

    </a>
</x-ui.card>
