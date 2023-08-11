{{--
    Shows post in small vertical card with image, title and date.
--}}
<div class="border rounded-lg overflow-hidden border-primary-700 bg-primary-800 hover:bg-primary-700 hover:border-primary-600 pb-2">

    <a href="{{ $post->url }}" class="block" title="Read '{{ $post->name }}'">

        <img src="{{ $post->image }}"/>

        <span class="block leading-tight text-lg p-4 pb-2">{{ $post->name }}</span>

        <x-ui.badges.age :date="$post->created_at" class="px-4" />

    </a>

</div>