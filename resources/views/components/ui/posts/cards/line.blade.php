{{--
    Shows post in line card with title, category and date.
--}}
<div class="border-b border-primary-400 pb-2">

    <h3 class="text-lg leading-tight">
        <a href="{{ $post->url }}">{{ $post->name }}</a>
    </h3>

    <x-ui.badges.age :date="$post->created_at" />

</div>